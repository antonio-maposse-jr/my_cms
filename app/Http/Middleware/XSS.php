<?php

namespace App\Http\Middleware;

use Closure;
use Mews\Purifier\Facades\Purifier;

class XSS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $input = $request->all();
//        if ($request->route()->uri != 'admin/settings') {
//            array_walk_recursive($input, function (&$input) {
//               
//                $input = (is_null($input)) ? null : Purifier::clean(html_entity_decode($input),'default');
//            });
//            $request->merge($input);
//        }

        return $next($request);
    }
}
