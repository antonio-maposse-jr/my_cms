<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {

        $posts = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereCreatedBy(getLogInUserId())
            ->count();
        $postsDraft = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->where('status',
            Post::STATUS_DRAFT)->whereCreatedBy(getLogInUserId())->count();

        return view('dashboard.customer-dashboard', compact('posts', 'postsDraft'));
    }
}
