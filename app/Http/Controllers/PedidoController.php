<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Models\Pedido;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        $tipoPedido = in_array($request->tipo_pedido, ['local', 'delivery']) ? $request->tipo_pedido : 'local';

        $rules = [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'itens' => 'required|json',
            'tipo_pedido' => 'in:local,delivery',
        ];

        if ($tipoPedido === 'local') {
            $rules['mesa'] = 'required|string|max:10';
        } elseif ($tipoPedido === 'delivery') {
            $rules['endereco'] = 'required|string|max:255';
            $rules['telefone'] = 'required|string|max:20';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $usuario = Usuario::where('email', $request->email)->first();
        if (!$usuario) {
            return back()->withErrors(['Usuário não encontrado!'])->withInput();
        }

        try {
            $itens = json_decode($request->itens, true);
            if (!is_array($itens)) {
                return back()->withErrors(['Itens do pedido estão mal formatados.'])->withInput();
            }

            $data = [
                'nome_cliente' => $request->nome,
                'email_cliente' => $request->email,
                'status' => 'pendente',
                'itens_pedido' => json_encode($itens),
                'tipo_pedido' => $tipoPedido,
            ];

            if ($tipoPedido === 'local') {
                $data['mesa'] = $request->mesa;
            } else {
                $data['endereco'] = $request->endereco;
                $data['telefone'] = $request->telefone;
            }

            $pedido = Pedido::create($data);

            session()->put('pedido_id', $pedido->id); 

            if ($tipoPedido === 'delivery') {
                return redirect()->route('preferencia.pagamento')
                    ->with('success', 'Pedido realizado! Faça o pagamento.');
            } else {
                return redirect()->route('user.index')
                    ->with('success', 'Pedido realizado com sucesso! Aguarde na sua mesa.');

            }

        } catch (\Exception $e) {
            \Log::error('Erro ao salvar pedido', ['exception' => $e]);
            return back()->withErrors(['Ocorreu um erro ao processar seu pedido. Tente novamente mais tarde.']);
        }
    }

}
