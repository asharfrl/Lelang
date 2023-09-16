<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle($request, Closure $next, ...$levels)
    {
        if (!auth()->check()) {
            // Jika pengguna tidak terautentikasi, arahkan ke halaman login
            return redirect('/login');
        }

        $user = auth()->user();

        if (in_array($user->level, $levels)) {
            // Pengguna memiliki level yang diizinkan, lanjutkan ke rute
            return $next($request);
        }

        // Jika pengguna tidak memiliki level yang diizinkan, arahkan ke halaman 403 (Unauthorized)
        return abort(403, 'Unauthorized action.');
    }
}
