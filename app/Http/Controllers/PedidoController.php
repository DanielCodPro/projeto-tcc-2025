<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $request)
{
    // Tenta decodificar os itens (caso já sejam JSON)
    $itens = json_decode($request->itens, true);

    // Se não for um array válido, retorna erro
    if (!is_array($itens)) {
        return back()->withErrors('Erro ao processar os itens do pedido.');
    }

    Pedido::create([
        'nome_cliente' => $request->nome,
        'email_cliente' => $request->email,
        'mesa' => $request->mesa,
        'itens_pedido' => json_encode($itens), // Agora temos certeza que é JSON válido
    ]);

    return redirect('/pagamento');
}
}

