<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    public function store(Request $request)
 {
    $itens = json_decode($request->itens, true);

    if (!is_array($itens)) {
        return back()->withErrors('Erro ao processar os itens do pedido.');
    }

    // Tenta pegar nome e email do formulário (via input hidden). Se não tiver, busca pela sessão.
    $nome = $request->nome;
    $email = $request->email;

    if (!$nome || !$email) {
        $usuario = null;
        if (session()->has('usuario_id')) {
            $usuario = Usuario::find(session('usuario_id'));
        }

        $nome = $nome ?? ($usuario?->nome ?? 'Desconhecido');
        $email = $email ?? ($usuario?->email ?? '');
    }

    Pedido::create([
        'nome_cliente' => $nome,
        'email_cliente' => $email,
        'mesa' => $request->mesa,
        'status' => 'pendente',
        'itens_pedido' => json_encode($itens),
    ]);
    return redirect('/pagamento');
 }
}

