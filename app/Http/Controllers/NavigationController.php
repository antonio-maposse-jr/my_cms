<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Navigation;
use App\Models\SubCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NavigationController extends AppBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['navigations'] = Navigation::with('navigationable')
            ->whereHas('navigationable', function ($q) {
                $q->where('show_in_menu', 1);
            })->whereNull('parent_id')->orderBy('order_id')->get();
        $data['navigationSubs'] = [];
        foreach ($data['navigations'] as $item) {
            $navigationType = $item->navigationable_type == Category::class ? SubCategory::class : $item->navigationable_type;
            $data['navigationSubs'][$item->id] = Navigation::with('navigationable')
                ->whereHas('navigationable', function ($q) {
                    $q->where('show_in_menu', 1);
                })->where('navigationable_type', $navigationType)
                ->where('parent_id', $item->navigationable_id)
                ->orderBy('order_id')
                ->get();
        }

        return view('navigation.index')->with($data);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $input = $request->all();
        //parent menu
        foreach ($input['navigation_id'] as $key => $id) {
            Navigation::whereId($id)->update([
                'order_id' => $key + 1,
            ]);
        }

        return $this->sendSuccess('Navigation updated successfully.');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function languageChange(Request $request)
    {
        if (! empty($request->all())) {
            session(['languageChange' => $request->all()]);
        }

        return $this->sendSuccess('Language changed successfully');
    }
}
