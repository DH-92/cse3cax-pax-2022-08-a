<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $required = null, int $minimum = null)
    {
        $user = Session::get('user');
        if (Session::get('user') == null) {//Ensure that a user is logged in to access this page
            return redirect('/login')->with('message', 'Access Denied. Please log in to continue.');
        } elseif (isset($required) && ($required != $user->userType && $required != 'null')) {//Restrict access to only users of a specific permission level (ie: allow only lecturers)
            return redirect('unauthorized');
        } elseif (isset($minimum) && $user->userType < $minimum) {//Restrict access to this page based on a minimum permission level (ie: let in users who are at least manager level)
            return redirect('unauthorized');
        }

        return $next($request);
    }
}
