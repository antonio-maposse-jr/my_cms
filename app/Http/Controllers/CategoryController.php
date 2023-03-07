<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\Navigation;
use App\Models\SubCategory;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends AppBaseController
{
    /**
     * @var CategoryRepository
     */
    private $CategoryRepository;

    /**
     * CategoryRepository constructor.
     *
     * @param  CategoryRepository  $CategoryRepository
     */
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $language = Language::all()->pluck('name', 'id')->sort();

        return view('categories.index', compact('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @param  CreateCategoriesRequest  $request
     * @return JsonResponse
     */
    public function store(CreateCategoriesRequest $request)
    {
        $input = $request->all();

        $this->CategoryRepository->create($input);

        return $this->sendSuccess('Category created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return JsonResponse
     */
    public function edit(Category $category)
    {
        $data['category'] = $category;
        $data['post_count'] = $category->posts()->count();

        return $this->sendResponse($data, 'Category Rretrived Successfully.');
    }

    /**
     * @param  UpdateCategoriesRequest  $request
     * @param  Category  $category
     * @return JsonResponse
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $input = $request->all();

        $this->CategoryRepository->update($input, $category->id);

        return $this->sendSuccess('Category updated successfully.');
    }

    /**
     * @param  Category  $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $id = $category->id;
        if ($category->subCategories()->count() > 0 || $category->posts()->count() > 0) {
            return $this->sendError('This category is in use');
        }

        $category->navigation()->delete();
        Navigation::whereNavigationableType(SubCategory::class)->whereParentId($id)->delete();
        $category->delete();

        return $this->sendSuccess('Category deleted successfully.');
    }
}
