<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (!Auth::user()->isSuperAdmin()) {
            return redirect('/')->with('error', 'Hanya Super Admin yang bisa mengakses halaman ini.');
        }

        return $next($request);
    }
}