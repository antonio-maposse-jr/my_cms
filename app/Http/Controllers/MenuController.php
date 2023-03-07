<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\Navigation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class MenuController extends AppBaseController
{
    public function index(Request $request)
    {
        return view('menu.index');
    }

    /**
     * Show the form for creating a new Staff.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $menus = Menu::where('parent_menu_id', null)->orderBy('id', 'ASC')->pluck('title', 'id');

        return view('menu.create', compact('menus'));
    }

    /**
     * @param  CreateMenuRequest  $request
     * @return mixed
     */
    public function store(CreateMenuRequest $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();
            $input['show_in_menu'] = (isset($input['show_in_menu'])) ? Menu::SHOW_MENU_ACTIVE : Menu::SHOW_MENU_DEACTIVE;
            $menu = Menu::create($input);

            if (isset($menu['parent_menu_id'])) {
                $navigationOrder = Navigation::whereNavigationableType(Menu::class)
                        ->whereParentId($menu['parent_menu_id'])->count() + 1;
            } else {
                $navigationOrder = Navigation::whereNull('parent_id')->count() + 1;
            }

            Navigation::create([
                'navigationable_type' => Menu::class,
                'navigationable_id' => $menu['id'],
                'order_id' => $navigationOrder,
                'parent_id' => $menu['parent_menu_id'] ?? null,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        Flash::success('Menu created successfully.');

        return redirect(route('menus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $menu = Menu::with(['parent', 'submenu'])->findOrFail($menu['id']);
        $menus = Menu::where('id', '!=', $menu['id'])->whereNull('parent_menu_id')
            ->orderBy('id', 'ASC')->pluck('title', 'id');

        return view('menu.edit', compact('menu', 'menus'));
    }

    /**
     * @param  UpdateMenuRequest  $request
     * @param  Menu  $menu
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();
            $input['show_in_menu'] = (isset($input['show_in_menu'])) ? 1 : 0;
            $oldParentId = $menu['parent_menu_id'];
            $changeParentMenu = $input['parent_menu_id'] != $oldParentId;

            $menu->update($input);
            if ($changeParentMenu) {
                if (isset($menu['parent_menu_id'])) {
                    $navigationOrder = Navigation::whereNavigationableType(Menu::class)
                            ->whereParentId($menu['parent_menu_id'])->count() + 1;
                } else {
                    $navigationOrder = Navigation::whereNull('parent_id')->count() + 1;
                }
                $menu->navigation->update([
                    'order_id' => $navigationOrder,
                    'parent_id' => $menu['parent_menu_id'] ?? null,
                ]);
                if (isset($oldParentId)) {
                    $subsNavigation = Navigation::whereNavigationableType(Menu::class)
                        ->whereParentId($oldParentId)->orderBy('order_id')->get();
                    foreach ($subsNavigation as $key => $navigation) {
                        $navigation->update([
                            'order_id' => $key + 1,
                        ]);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        Flash::success('Menu update successfully.');

        return redirect(route('menus.index'));
    }

    /**
     * @param  Menu  $menu
     * @return JsonResponse
     */
    public function destroy(Menu $menu)
    {
        $menuId = $menu->id;
        $parentMenuId = $menu->parent_menu_id;

        $menu->navigation()->delete();

        if (is_null($parentMenuId)) {
            Navigation::whereNavigationableType(Menu::class)->whereParentId($menuId)->delete();
        } else {
            $subsNavigation = Navigation::whereNavigationableType(Menu::class)
                ->whereParentId($parentMenuId)->orderBy('order_id')->get();
            foreach ($subsNavigation as $key => $navigation) {
                $navigation->update([
                    'order_id' => $key + 1,
                ]);
            }
        }

        $menu->delete();

        return $this->sendSuccess('Menu deleted successfully.');
    }
}
