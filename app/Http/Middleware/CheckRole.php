<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $levels): Response
    {
        // Redirect to login if unauthenticated
        if (!auth()->check()) {
            return redirect('login');
        }


        $user = Auth::user()?->load('role');


        // Check if the user exists, has a role, and if the role name matches allowed levels
        if ($user && $user->role && in_array($user->role->name, (array) $levels)) {
            return $next($request);
        }


        // Redirect unauthorized users to the home page or a 403 page
        return redirect('/dashboard')->with('error', 'Unauthorized access.');

    }
}
