<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Lewati pengecekan untuk route login
        if ($request->routeIs('login')) {
            return $next($request);
        }

        // Cek autentikasi
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Verifikasi role
        if (!empty($roles) && !in_array($userRole, $roles)) {
            return redirect()->route('unauthorized');
        }

        return $next($request);
    }
}
