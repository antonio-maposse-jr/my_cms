<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MenuTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage', 'updateShowInMenu'];

    public string $tableName = 'Menu';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.title'), 'title')
                ->sortable()->searchable(),
            Column::make(__('messages.menu.parent_menu'), 'parent.title')
                ->searchable(),
            Column::make(__('messages.menu.show_in_menu'), 'show_in_menu')->addClass('text-center'),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('custom-width-action'),
        ];
    }

    public function query(): Builder
    {
        return Menu::with('parent');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.menu_table';
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
                'componentName' => 'menu.add-button',
            ]);
    }

    public function updateShowInMenu($showInMenu, $id)
    {
        $updatedShowInMenu = ($showInMenu) ? 0 : 1;
        $menu = Menu::findOrFail($id);
        $menu->update(['show_in_menu' => $updatedShowInMenu]);

        $this->resetPage();
        $this->dispatchBrowserEvent('success', 'Show in menu updated successfully');
    }
}
