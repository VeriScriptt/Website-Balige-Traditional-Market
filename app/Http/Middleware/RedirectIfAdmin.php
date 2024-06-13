<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
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
        // Periksa jika pengguna terotentikasi dan memiliki peran admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Jika iya, arahkan mereka ke halaman yang sesuai
            return redirect()->route('admin.dashboard'); // Ganti dengan rute yang sesuai
        }

        // Lanjutkan ke halaman yang diminta jika pengguna bukan admin
        return $next($request);
    }
}
