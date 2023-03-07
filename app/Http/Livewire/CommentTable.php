<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CommentTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.post.posts'), 'posts.title')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Post::select('title')->whereColumn('id', 'post_id'), $direction);
                })->searchable(),
            Column::make(__('messages.emails.email'), 'email')
                ->sortable()->searchable(),
            Column::make(__('messages.comment.comment'), 'comment')
                ->sortable()->searchable(),
            Column::make(__('messages.status'), 'status')
                ->sortable(),
            Column::make(__('messages.common.action')),
        ];
    }

    public function query(): Builder
    {
        if (!Auth::user()->hasRole('customer')) {
            return Comment::with('posts');
        }
        if (Auth::user()->hasRole('customer')) {
            $post = Post::whereCreatedBy(getLogInUserId())->pluck('id');

            return Comment::with('posts')->whereIn('post_id', $post);
        }

    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.comment_table';
    }

    /**
     * @param $status
     * @param $id
     */
    public function updateStatus($status, $id)
    {
        $commentStatus = ($status == 1) ? '0' : '1';
        $status = Comment::findOrFail($id);
        $status->update(['status' => $commentStatus]);
        $this->resetPage();
        $this->dispatchBrowserEvent('success', 'Status updated successfully');
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
                'componentName' => 'comment.approval-button',
            ]);
    }
}
