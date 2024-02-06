<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {

            $user = Auth::user();

            if ($user->is_admin()) {

                return $next($request);

            }

            return redirect('/');

        }

        return redirect('/');

    }
}
