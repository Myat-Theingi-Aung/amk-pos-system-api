<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventOtherUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loggedInUser = Auth::guard('sanctum')->user();

        if ($loggedInUser->role === 'user') {
            $requestedUserId = $request->route('user')->id;
        
            if ($loggedInUser->id != $requestedUserId) {
                return response()->json('Unauthorized');
            }
        }
        return $next($request);
    }
}
