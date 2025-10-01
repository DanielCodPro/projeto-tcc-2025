<?php
namespace App\Http\Middleware;

use Closure;

class RedirectIfUsuarioAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (session()->has('usuario_id')) {
            return redirect()->route('user.index');
        }
        return $next($request);
    }
}
