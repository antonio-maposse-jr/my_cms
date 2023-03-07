<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Plan;

class PlanTable extends LivewireTableComponent
{

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'plan';

    public $orderBy = 'desc';  // default

    protected $queryString = []; //url

    public function query(): Builder
    {
        return Plan::query();
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
                'componentName' => 'plan.add-button',
            ]);
    }
    
    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Price", "price")
                ->sortable()->searchable(),
            Column::make("Frequency", "frequency")
                ->sortable(),
            Column::make("Is default", "is_default")
                ->sortable(),
            Column::make("Action", "id")->addClass('w-100px justify-content-center d-flex'),
        ];
    }
    
    public function rowView(): string
    {
        return 'livewire-tables.rows.plan_table';
    }
}
