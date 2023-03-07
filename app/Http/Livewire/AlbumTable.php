<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Language;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AlbumTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Album';


    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.count'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                })
                ->searchable(),
            Column::make(__('messages.common.action'), 'id')->addClass('custom-width-album'),

        ];
    }

    public function query()
    {
        return Album::with('language', 'gallery');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.album_table';
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
                'componentName' => 'album.add-button',
            ]);
    }
}
