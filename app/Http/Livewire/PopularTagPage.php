<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PopularTagPage extends SearchableComponent
{
    public $tagName;

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public $paginationTheme = 'bootstrap';

    public function render()
    {
        $popularTag = $this->postsData();

        return view('livewire.popular-tag-page', compact('popularTag'));
    }

    /**
     * @return LengthAwarePaginator
     */
    public function postsData()
    {
        $this->setQuery($this->getQuery()->with([
            'language', 'category', 'postArticle', 'postGalleries', 'postSortLists.media', 'postSortLists', 'media', 'user',
        ])->where('visibility', Post::VISIBILITY_ACTIVE)->withCount('comment')->where('tags', 'like', '%'.$this->tagName.'%'));

        return $this->paginate();
    }

    public function model()
    {
        return Post::class;
    }

    public function searchableFields()
    {
        return [];
    }
}
