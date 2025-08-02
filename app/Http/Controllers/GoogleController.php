<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Usuario;
use App\Mail\BoasVindas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        $googleUser = Socialite::driver('google')->stateless()->user(); //permanecer utilizando o modo stateless, pois é necessário para evitar problemas de sessão em ambientes de produção(mas n é recomendado para ambientes de produção, pois pode causar problemas de segurança se não for bem gerenciado)


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

        //Armazena o ID do usuário na sessão
        session(['usuario_id' => $usuario->id]);

        //Verifica se o telefone já está cadastrado
        if ($usuario->telefone) {
            return redirect()->route('user.index')->with('mensagem', 'Login com Google realizado com sucesso!');
        }

        return redirect()->route('user.telefone')->with('mensagem', 'Login com Google realizado! Informe seu telefone para continuar.');
    }

    public function formTelefone()
    {
        $usuario = Usuario::find(session('usuario_id'));
        return view('userPages.telefone', compact('usuario'));
    }

    public function salvarTelefone(Request $request)
    {
        $request->validate([
            'telefone' => 'required|min:10|max:15',
        ]);

        $usuario = Usuario::find(session('usuario_id'));
        $usuario->telefone = $request->telefone;
        $usuario->save();

        return redirect()->route('user.index')->with('mensagem', 'Telefone cadastrado com sucesso!');
    }

}

