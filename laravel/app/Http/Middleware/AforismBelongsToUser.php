<?php

namespace App\Http\Middleware;

use Closure;

class AforismBelongsToUser
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
        $aforisms = $request->user()->aforisms()->get(['id'])->toArray();

        $id = $request->aforisme;

        if(!in_array($id, array_flatten($aforisms) )) {
            return back();
        }

        return $next($request);
    }
}
