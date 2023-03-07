<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AlbumCategoryTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'albumCategory';

    public bool $sortingStatus = false;

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.name'), 'name')
                ->sortable()->searchable(),
            Column::make(__('messages.gallery.album'), 'album.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Album::select('name')->whereColumn('id', 'album_id'), $direction);
                })
                ->searchable(),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                })
                ->searchable(),
            Column::make(__('messages.common.action'), 'id')->addClass('custom-width-action'),
        ];
    }

    public function query(): Builder
    {
        return AlbumCategory::with(['album', 'language']);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.album_category_table';
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
                'componentName' => 'album_category.add-button',
            ]);
    }
}
