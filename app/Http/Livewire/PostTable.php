<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PostTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = [
        'refresh' => '$refresh', 'filterPostType', 'filterCategory', 'filterLangId', 'filterSubCategory', 'resetPage',
    ];

    public $postName;

    public $addButtonText = null;

    public $addRouteSection = null;

    public $lang_id = null;

    public $category_id = null;

    public $post_type = null;

    public $sub_category_id = null;

    public string $tableName = 'Post';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function columns(): array
    {
        return [
            Column::make(__('messages.common.title'), 'title')
                ->sortable()->searchable()->addClass('w-300px'),
            Column::make(__('messages.post.show_on_headline'), 'category.name'),
            Column::make(__('messages.post.visibility'), 'post_types'),
            Column::make(__('messages.post.featured'), 'post_types'),
            Column::make(__('messages.common.created_at'), 'created_at')
                ->sortable(),
            Column::make(__('messages.common.action'), 'id')->addClass('text-start'),
        ];
    }

    public function query(): Builder
    {
        if (Auth::user()->hasRole('customer')) {
            $query = Post::withoutGlobalScope(AuthoriseUserActivePostScope::class)->withoutGlobalScope(LanguageScope::class)
                ->withoutGlobalScope(PostDraftScope::class)->with('language:id,name',
                    'category:id,name')->whereCreatedBy(getLogInUserId());
        } else {
            $query = Post::withoutGlobalScope(AuthoriseUserActivePostScope::class)->withoutGlobalScope(LanguageScope::class)
                ->withoutGlobalScope(PostDraftScope::class)->with('language:id,name', 'category:id,name');
        }
        if (!empty($this->post_type)) {
            $query->where('post_types', $this->post_type);
        }
        if (!empty($this->category_id)) {
            $query->where('category_id', $this->category_id);
        }
        if (!empty($this->sub_category_id)) {
            $query->where('sub_category_id', $this->sub_category_id);
        }
        if (!empty($this->lang_id)) {
            $query->where('lang_id', $this->lang_id);
        }

        return $query;
    }

    public function rowView(): string
    {
        $this->addButtonText = __('messages.post.add_post');
        $this->addRouteSection = 'post_format';

        return 'livewire-tables.rows.post_table';
    }

    public function render()
    {
        return view('livewire-tables.datatable.add_post_datatable')
            ->with([
                'columns'       => $this->columns(),
                'rowView'       => $this->rowView(),
                'filtersView'   => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows'          => $this->rows,
                'modalsView'    => $this->modalsView(),
                'bulkActions'   => $this->bulkActions,
            ]);
    }

    public function updateFeatured($postId)
    {
        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->findOrFail($postId);
        $post->update([
            'featured' => !$post->featured,
        ]);

        $this->emit('refresh');

        $message = $post->featured ? 'Post added to featured successfully' : 'Post removed from featured successfully';
        $this->dispatchBrowserEvent('success', $message);
    }

    public function updateVisibility($postId)
    {

        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->findOrFail($postId);
        $postVisibilityCount = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereCreatedBy(getLogInUserId())->whereVisibility(1)->count();
        if ($post->status != 1) {
            $message = 'Given post is not yet published.';

            $this->dispatchBrowserEvent('error', $message);
        }else{
            if (Auth::user()->hasRole('customer')) {

                if ($postVisibilityCount < getloginuserplan()->plan->post_count) {
                    $post->update([
                        'visibility' => !$post->visibility,
                    ]);
                } else {

                    $post->update([
                        'visibility' => 0,
                    ]);

                    $message = 'Please Upgrade Plan';
                    
                  
                    $this->dispatchBrowserEvent('success', $message);
                }
            } else {
                $post->update([
                    'visibility' => !$post->visibility,
                ]);
                $this->emit('refresh');

                $message = $post->visibility ? 'Post added to visibility successfully' : 'Post removed from visibility successfully';
                $this->dispatchBrowserEvent('success', $message);
            }   
        }
       


    }

    public function updateHeadline($postId)
    {
        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->findOrFail($postId);
        $post->update([
            'show_on_headline' => !$post->show_on_headline,
        ]);

        $this->emit('refresh');

        $message = $post->show_on_headline ? 'Post added on headline successfully' : 'Post removed from headline successfully';
        $this->dispatchBrowserEvent('success', $message);
    }

    public function updateBreaking($postId)
    {
        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->findOrFail($postId);
        $post->update([
            'breaking' => !$post->breaking,
        ]);

        $this->emit('refresh');

        $message = $post->breaking ? 'Post added to breaking successfully' : 'Post removed from breaking successfully';
        $this->dispatchBrowserEvent('success', $message);
    }

    public function updateSlider($postId)
    {
        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->findOrFail($postId);
        $post->update([
            'slider' => !$post->slider,
        ]);

        $this->emit('refresh');

        $message = $post->slider ? 'Post added to slider successfully' : 'Post removed from slider successfully';
        $this->dispatchBrowserEvent('success', $message);
    }

    public function updateRecommended($postId)
    {
        $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->findOrFail($postId);
        $post->update([
            'recommended' => !$post->recommended,
        ]);

        $this->emit('refresh');

        $message = $post->recommended ? 'Post added to recommended successfully' : 'Post removed from recommended successfully';
        $this->dispatchBrowserEvent('success', $message);
    }

    public function filterCategory($id)
    {
        return $this->category_id = $id;
    }

    public function filterSubCategory($id)
    {
        $this->sub_category_id = $id;
    }

    public function filterLangId($id)
    {
        $this->lang_id = $id;
    }

    public function filterPostType($id)
    {
        $this->post_type = $id;
    }
}
