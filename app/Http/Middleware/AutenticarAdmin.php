<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticarAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin_logado')) {
            return redirect()->route('admin.login.form')->with('error', 'Você precisa estar logado.');
        }

        return $next($request);
    }
}
