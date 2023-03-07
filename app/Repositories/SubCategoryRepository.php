<?php

namespace App\Repositories;

use App\Models\Navigation;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserRepository
 */
class SubCategoryRepository extends BaseRepository
{
    public $fieldSearchable = [
        'name',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return SubCategory::class;
    }

    /**
     * @param  array  $input
     * @return bool
     */
    public function create($input)
    {
        $input['show_in_menu'] = (isset($input['show_in_menu'])) ? SubCategory::SHOW_MENU_ACTIVE : SubCategory::SHOW_MENU_DEACTIVE;
        $subCategory = SubCategory::create($input);

        $navigationOrder = Navigation::whereNavigationableType(SubCategory::class)
                ->whereParentId($subCategory['parent_category_id'])->count() + 1;

        Navigation::create([
            'navigationable_type' => SubCategory::class,
            'navigationable_id' => $subCategory['id'],
            'order_id' => $navigationOrder,
            'parent_id' => $subCategory['parent_category_id'] ?? null,
        ]);

        return true;
    }

    /**
     * @param $input
     * @param $subCategory
     * @return bool
     */
    public function update($input, $subCategory)
    {
        try {
            DB::beginTransaction();

            $oldParentId = $subCategory->parent_category_id;
            $changeParent = $input['parent_category_id'] != $oldParentId;
            $input['show_in_menu'] = isset($input['show_in_menu']);

            $subCategory->update($input);

            if ($changeParent) {
                //new
                $navigationOrder = Navigation::whereNavigationableType(SubCategory::class)
                        ->whereParentId($subCategory->parent_category_id)->count() + 1;
                $subCategory->navigation->update([
                    'order_id' => $navigationOrder,
                    'parent_id' => $subCategory->parent_category_id,
                ]);

                //old
                $subsNavigation = Navigation::whereNavigationableType(SubCategory::class)
                        ->whereParentId($oldParentId)->orderBy('order_id')->get();
                foreach ($subsNavigation as $key => $navigation) {
                    $navigation->update([
                        'order_id' => $key + 1,
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        return true;
    }
}
