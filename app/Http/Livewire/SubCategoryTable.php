<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Language;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubCategoryTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'subCategory';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable()->addClass('text-size'),
            Column::make(__('messages.menu.parent_menu'), 'category.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Category::select('name')->whereColumn('id', 'parent_category_id'), $direction);
                })
                ->searchable()
                ->addClass('text-size'),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                })
                ->searchable()
                ->addClass('text-size'),
            Column::make(__('messages.menu.show_in_menu'), 'show_in_menu')
                ->addClass('text-size'),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('text-size'),
        ];
    }

    public function updateShowInMenu($showInMenu, $id)
    {
        $updatedShowInMenu = ($showInMenu) ? 0 : 1;
        $category = SubCategory::findOrFail($id);
        $category->update(['show_in_menu' => $updatedShowInMenu]);

        $this->resetPage();
        $this->dispatchBrowserEvent('success', 'Show in menu updated successfully');
    }

    public function query(): Builder
    {
        return SubCategory::with('language', 'category');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sub_category_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                'filtersView' => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows' => $this->rows,
                'modalsView' => $this->modalsView(),
                'bulkActions' => $this->bulkActions,
                'componentName' => 'sub_category.add-button',
            ]);
    }
}
