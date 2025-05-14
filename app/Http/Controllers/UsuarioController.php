<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);
    
        $usuario = Usuario::where('email', $request->email)->first();
    
        if ($usuario) {
            // Usuário já cadastrado
            return redirect()->route('index')->with('mensagem', 'Login realizado com sucesso!');
        }
    
        // Novo usuário
        $novoUsuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);
        // Redireciona após cadastro
        return redirect()->route('user.entrar')->with('mensagem', 'Cadastro realizado com sucesso!');
    }

    public function entrar(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    $usuario = Usuario::where('email', $request->email)
              ->where('nome', $request->nome)
              ->first();

    if (!$usuario) {
        return redirect()->route('cadastro')->with('mensagem', 'Usuário não encontrado!');
    }

    // Salva o ID na sessão
    session(['usuario_id' => $usuario->id]);

    // Verifica se é admin
    if ($usuario->nome === 'admin' && $usuario->email === 'admin@gmail.com') {
        return redirect()->route('admin')->with('mensagem', 'Bem-vindo, Admin!');
    }

    return redirect()->route('user.index')->with('mensagem', 'Login realizado com sucesso!');
}


    public function editar(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
    
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);
    
        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);
    
        return redirect()->route('index')->with('mensagem', 'Usuário atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
    
        return redirect()->route('cadastro')->with('mensagem', 'Usuário deletado com sucesso!');
    }

}
