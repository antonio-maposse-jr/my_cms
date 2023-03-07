<?php

namespace App\Repositories;

use App\Models\Page;

/**
 * Class PageRepository
 */
class PageRepository extends BaseRepository
{
    public $fieldSearchable = [
        'name',
        'title',
        'meta_title',
        'lang_id',
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
        return Page::class;
    }

    public function store($input)
    {
        $input['visibility'] = $input['visibility'] = (isset($input['visibility'])) ? Page::VISIBILITY_ACTIVE : Page::VISIBILITY_DEACTIVE;

        $input['show_breadcrumb'] = $input['show_breadcrumb'] = (isset($input['show_breadcrumb'])) ? Page::SHOW_BREADCRUMP_ACTIVE : Page::SHOW_BREADCRUMP_DEACTIVE;

        $input['show_right_column'] = $input['show_right_column'] = (isset($input['show_right_column'])) ? Page::SHOW_RIGHT_ACTIVE : Page::SHOW_RIGHT_DEACTIVE;

        $input['permission'] = $input['permission'] = (isset($input['permission'])) ? Page::PERMISION_ACTIVE : Page::PERMISION_DEACTIVE;

        $input['show_title'] = $input['show_title'] = (isset($input['show_title'])) ? Page::SHOW_TITLE_ACTIVE : Page::SHOW_TITLE_DEACTIVE;

        Page::create($input);
    }

    public function update($input, $id)
    {
        $page = Page::find($id);

        $input['visibility'] = $input['visibility'] = (isset($input['visibility'])) ? Page::VISIBILITY_ACTIVE : Page::VISIBILITY_DEACTIVE;

        $input['show_breadcrumb'] = $input['show_breadcrumb'] = (isset($input['show_breadcrumb'])) ? Page::SHOW_BREADCRUMP_ACTIVE : Page::SHOW_BREADCRUMP_DEACTIVE;

        $input['show_right_column'] = $input['show_right_column'] = (isset($input['show_right_column'])) ? Page::SHOW_RIGHT_ACTIVE : Page::SHOW_RIGHT_DEACTIVE;

        $input['permission'] = $input['permission'] = (isset($input['permission'])) ? Page::PERMISION_ACTIVE : Page::PERMISION_DEACTIVE;

        $input['show_title'] = $input['show_title'] = (isset($input['show_title'])) ? Page::SHOW_TITLE_ACTIVE : Page::SHOW_TITLE_DEACTIVE;

        $page->update($input);
    }
}
