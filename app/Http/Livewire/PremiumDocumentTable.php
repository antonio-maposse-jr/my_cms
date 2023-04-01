<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PremiumDocuments;


class PremiumDocumentTable extends LivewireTableComponent
{

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Premium Documents';

    public $orderBy = 'desc';  // default

    protected $queryString = []; //url

    public function query(): Builder
    {
        return PremiumDocuments::query();
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
                'componentName' => 'premium_document.add-button',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Document Type", "type")
                ->sortable()->searchable(),
            Column::make("URL", "url")
                ->sortable(),
            Column::make("Action", "id")->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.premium_document_table';
    }
}
