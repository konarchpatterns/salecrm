<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Cache as FacadesCache;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (FacadesAuth::check()) {
            $expiresAt = now()->addMinutes(2); /* keep online for 2 min */
            FacadesCache::put('user-is-online-' . FacadesAuth::user()->id, true, $expiresAt);
  
            /* last seen */
            User::where('id', FacadesAuth::user()->id)->update(['last_seen' => now()]);
        }
        return $next($request);
    }
}
