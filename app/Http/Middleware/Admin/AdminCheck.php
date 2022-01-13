<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
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
        // getting user roles
        $roles = array();
        foreach (auth()->user()->roles as $role) {
            array_push($roles, $role->name);
        }
        // getting user roles

        // check if user is super admin or not
        if ((in_array("admin", $roles) or in_array("writer", $roles)) and auth()->user()->status == 1) {
            return $next($request);
        } else {
            return redirect("/");
        }
    }
}
