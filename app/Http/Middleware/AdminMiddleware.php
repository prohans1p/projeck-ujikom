<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login dan memiliki peran 'admin'
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request); // Jika ya, lanjutkan ke request berikutnya
        }

        // Jika tidak, redirect ke halaman yang sesuai
        return redirect('/user/user/utama'); // Ganti '/' dengan rute lain yang sesuai jika perlu
    }
}
