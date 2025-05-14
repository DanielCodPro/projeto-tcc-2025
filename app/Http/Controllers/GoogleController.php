<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Usuario;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $usuario = Usuario::where('email', $googleUser->getEmail())->first();

        if (!$usuario) {
            // Se não existe, cria
            $usuario = Usuario::create([
                'nome' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'telefone' => null,
                'google_id' => $googleUser->getId(),
            ]);
        }

        session(['usuario_id' => $usuario->id]);
        return redirect()->route('user.index')->with('mensagem', 'Login com Google realizado!');
    }

    
}

