<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $usuarioId = session('usuario_id');

        if (!$usuarioId) {
            return redirect()->route('entrar')->with('mensagem', 'Acesso restrito.');
        }

        $usuario = Usuario::find($usuarioId);

        if (!$usuario || $usuario->nome !== 'admin' || $usuario->email !== 'admin@gmail.com') {
            abort(403, 'Acesso não autorizado. Volte para a página inicial');
        }

        return $next($request);
    }
}