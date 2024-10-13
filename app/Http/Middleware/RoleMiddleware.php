<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Admin role has unrestricted access (assuming role_id 1 is for admin)
        if ($user && $user->role_id == 1) {
            return $next($request);
        }

        // Check if the user's role ID is among the allowed roles
        if (!$user || !in_array($user->role_id, $roles)) {
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
