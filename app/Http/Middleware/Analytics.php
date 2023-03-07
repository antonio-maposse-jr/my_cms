<?php

namespace App\Http\Middleware;

use App\Models\Analytic;
use App\Models\Post;
use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class Analytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = str_replace($request->root(), '', $request->url()) ?: '/';
        $uri = substr($uri, strrpos($uri, '/', -1));
        $agent = new Agent();
        $agent->setUserAgent($request->headers->get('user-agent'));
        $agent->setHttpHeaders($request->headers);
        $post = Post::withoutGlobalScope(AuthoriseUserActivePostScope::class)->withoutGlobalScope(LanguageScope::class)->where('slug', last(request()->segments()))->first();
        if (empty($post)) {
            return $next($request);
        }
        $sessionId = $request->session()->getId();
        $recordExists = Analytic::where('session', $sessionId)->where('post_id', $post->id)->where('ip', $request->ip())->exists();
        if ($recordExists) {
            return $next($request);
        }

        Analytic::create([
            'session' => $sessionId,
            'uri' => urldecode($uri),
            'country' => ! empty(Location::get($request->ip())) ? Location::get($request->ip())->countryName : '',
            'ip' => $request->ip(),
            'user_id' => getLogInUser() ? getLogInUser()->id : null,
            'post_id' => $post->id ? $post->id : null,
            'meta' => json_encode(Location::get($request->ip())),
        ]);

        return $next($request);
    }
}
