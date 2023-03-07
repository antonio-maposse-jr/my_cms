<?php

namespace App\Http\Livewire;

use App\Models\RssFeed;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RssFeedTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function columns(): array
    {
        return [
            Column::make(__('messages.rss_feed.feed_name'), 'feed_name')
                ->sortable(),
            Column::make(__('messages.rss_feed.feed_url'), 'feed_url')
                ->sortable(),

            Column::make(__('messages.rss_feed.post_import'), 'no_post')
                ->sortable(),
            Column::make(__('messages.languages'), 'language_id')
                ->sortable(),
            Column::make(__('messages.post.category'), 'category_id')
                ->sortable(),
            Column::make(__('messages.common.created_by'), 'auto_update')
                ->sortable(),
            Column::make(__('messages.rss_feed.auto_update'), 'auto_update')
                ->sortable(),
            Column::make(__('messages.common.action'), 'show_btn_text')->addClass('w-125px'),
        ];
    }

    public function query(): Builder
    {
        return RssFeed::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->with('language', 'category', 'user', 'posts');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.rss_feed_table';
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
                'componentName' => 'rss_feed.add-button',
            ]);
    }
}
