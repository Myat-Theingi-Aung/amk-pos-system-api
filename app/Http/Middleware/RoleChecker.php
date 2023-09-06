<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requestRole)
    {
        $role = Auth::check() ? Auth::user()->role->value : '';
        $requestRoles = explode("|", $requestRole);

        if (!in_array($role, $requestRoles))
        {
            return response()->json(['roleChecker' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
