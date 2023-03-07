<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RoleTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Role';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.count'), 'permissions')
                ->searchable(),
            Column::make(__('messages.role.permissions'), 'permissions.name')
                ->searchable(),
            Column::make(__('messages.common.action'), 'id')->addClass('w-125px'),
        ];
    }

    public function query(): Builder
    {
        return Role::with('permissions');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.role_table';
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
                'componentName' => 'roles.add-button',
            ]);
    }
}
