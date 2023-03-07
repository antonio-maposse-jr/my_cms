<?php

namespace App\Http\Livewire;

use App\Models\Language;
use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PageTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Page';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [

            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.title'), 'title')
                ->sortable()->searchable(),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                })->searchable(),
            Column::make(__('messages.page.visibility'), 'Visibility'),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('custom-width-action'),
        ];
    }

    public function query(): Builder
    {
        return Page::with('language');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.page_table';
    }

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns'       => $this->columns(),
                'rowView'       => $this->rowView(),
                'filtersView'   => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows'          => $this->rows,
                'modalsView'    => $this->modalsView(),
                'bulkActions'   => $this->bulkActions,
                'componentName' => 'page.add-button',
            ]);
    }
}
