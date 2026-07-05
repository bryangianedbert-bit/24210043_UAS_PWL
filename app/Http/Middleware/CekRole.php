<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    // Tambahkan parameter $role untuk menerima input dari route
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika user belum login atau rolenya tidak sesuai, tendang kembali
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini!');
        }

        // Jika sesuai, persilakan lewat
        return $next($request);
    }
}