<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class NewsLetterTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'newsLatter';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.emails.email'), 'email')
                ->searchable(),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('text-center'),
        ];
    }

    public function query(): Builder
    {
        return Subscriber::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.news_letter_table';
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
            ]);
    }
}
