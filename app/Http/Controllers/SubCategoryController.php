<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubcategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\Navigation;
use App\Models\SubCategory;
use App\Repositories\SubCategoryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubCategoryController extends AppBaseController
{
    /**
     * @var SubCategoryRepository
     */
    private $SubCategoryRepository;

    /**
     * CategoryRepository constructor.
     *
     * @param  SubCategoryRepository  $SubCategoryRepository
     */
    public function __construct(SubCategoryRepository $SubCategoryRepository)
    {
        $this->SubCategoryRepository = $SubCategoryRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $category = Category::all()->pluck('name', 'id')->sort();

        return view('sub_category.index', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSubcategoryRequest  $request
     * @return JsonResponse
     */
    public function store(CreateSubcategoryRequest $request)
    {
        $input = $request->all();

        $this->SubCategoryRepository->create($input);

        return $this->sendSuccess('Sub Categories saved successfully.');
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
     * @param  SubCategory  $subCategory
     * @return JsonResponse
     */
    public function edit(SubCategory $subCategory)
    {
        return $this->sendResponse($subCategory, 'Sub Category Retrieved Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateSubcategoryRequest  $request
     * @param  SubCategory  $subCategory
     * @return JsonResponse
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $input = $request->all();

        $this->SubCategoryRepository->update($input, $subCategory);

        return $this->sendSuccess('Sub Category updated successfully.');
    }

    /**
     * @param  SubCategory  $subCategory
     * @return JsonResponse
     */
    public function destroy(SubCategory $subCategory): JsonResponse
    {
        if ($subCategory->post()->count() > 0) {
            return $this->sendError('This Sub category is in use');
        }
        $parentId = $subCategory->parent_category_id;
        $subCategory->navigation()->delete();

        $subsNavigation = Navigation::whereNavigationableType(SubCategory::class)
            ->whereParentId($parentId)->orderBy('order_id')->get();
        foreach ($subsNavigation as $key => $navigation) {
            $navigation->update([
                'order_id' => $key + 1,
            ]);
        }

        $subCategory->delete();

        return $this->sendSuccess('Sub Category Delete Successfully');
    }
}
