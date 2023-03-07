<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\AlbumCategory;
use App\Models\Gallery;
use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class GalleryTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public string $tableName = 'Gallery';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.post.image'), 'gallery_image')->addAttributes(['style' => 'width:600px !important;']),
            Column::make(__('messages.common.title'), 'title')
                ->sortable()->searchable(),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                })
                ->searchable(),
            Column::make(__('messages.gallery.album'), 'album.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Album::select('name')->whereColumn('id', 'album_id'), $direction);
                })
                ->searchable(),
            Column::make(__('messages.post.category'), 'category.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(AlbumCategory::select('name')->whereColumn('id', 'category_id'), $direction);
                })
                ->searchable(),
            //            Column::make(__('messages.common.time'), "created_at")
            //                ->sortable(),
            Column::make(__('messages.common.action'), 'id'),
        ];
    }

    public function query(): Builder
    {
        return Gallery::with(['language:id,name', 'album:id,name', 'category:id,name', 'media']);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.gallery_table';
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
                'componentName' => 'gallery.add-button',
            ]);
    }
}
