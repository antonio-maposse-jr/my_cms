<?php

namespace App\Http\Livewire;

use App\Models\Emoji;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EmojiTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'emoji';

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.emoji.emoji'), 'emoji'),
            Column::make(__('messages.status'), 'status')
                ->sortable(),
//            Column::make(__('messages.common.action'), 'id'),
        ];
    }

    public function query()
    {
        return Emoji::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.emoji_table';
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
//                'componentName' => 'emojis.add-button',
            ]);
    }


}
