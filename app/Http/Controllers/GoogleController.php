<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Usuario;
use App\Mail\BoasVindas;
use Illuminate\Support\Facades\Mail;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        $googleUser = Socialite::driver('google')->user(); //permanecer utilizando o modo stateless, pois é necessário para evitar problemas de sessão em ambientes de produção(mas n é recomendado para ambientes de produção, pois pode causar problemas de segurança se não for bem gerenciado)


        $usuario = Usuario::where('email', $googleUser->getEmail())->first();

        if (!$usuario) {
            // Se não existe, cria
            $usuario = Usuario::create([
                'nome' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'telefone' => null,
                'google_id' => $googleUser->getId(),
            ]);

            try {
                Mail::to($usuario->email)->send(new WelcomeEmail($usuario));
            } catch (\Exception $e) {
                // Se falhar ao enviar o email, apenas registra o erro
                \Log::error('Erro ao enviar email de boas-vindas: ' . $e->getMessage());
            }
        }

        session(['usuario_id' => $usuario->id]);
        return redirect()->route('user.index')->with('mensagem', 'Login com Google realizado!');
    }

}

