<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoryTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Category';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable()->addClass('text-size'),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                })
                ->searchable()
                ->addClass('text-size'),
            Column::make(__('messages.common.count'), 'show_in_menu')
                ->addClass('text-size'),
            Column::make(__('messages.category.show_menu'), 'show_in_menu')
                ->addClass('text-size'),
            Column::make(__('messages.category.show_home'), 'show_in_home_page')
                ->addClass('text-size'),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('text-size'),
        ];
    }

    public function updateShowInMenu($showInMenu, $id)
    {
        $updatedShowInMenu = ($showInMenu) ? 0 : 1;
        $category = Category::findOrFail($id);
        $category->update(['show_in_menu' => $updatedShowInMenu]);

        $this->resetPage();

        $this->dispatchBrowserEvent('success', 'Show in menu updated successfully');
    }

    public function updateShowInHome($showInHome, $id)
    {
        $updatedShowInHome = ($showInHome) ? 0 : 1;
        $category = Category::find($id);
        $category->update(['show_in_home_page' => $updatedShowInHome]);

        $this->resetPage();

        $this->dispatchBrowserEvent('success', 'Show in home updated successfully');
    }

    public function query(): Builder
    {
        return Category::with('language', 'posts');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.category_table';
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
                'componentName' => 'categories.add-button',
            ]);
    }
}
