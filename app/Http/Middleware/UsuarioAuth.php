<?php
namespace App\Http\Middleware;

use Closure;

class UsuarioAuth
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('user.entrar')->with('mensagem', 'Faça login para continuar.');
        }
        return $next($request);
    }
}
