<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

class PagamentoController extends Controller
{
    public function criarPreferenciaAjax(Request $request)
    {
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

        $itens = $request->input('itens'); 
        if (!$itens || count($itens) === 0) {
            return response()->json(['error' => 'Itens do pedido não encontrados'], 400);
        }

        $mercadoPagoItems = [];
        foreach ($itens as $item) {
            $mercadoPagoItems[] = [
                "title" => $item['nome'] ?? 'Produto',
                "quantity" => (int)($item['quantidade'] ?? 1),
                "unit_price" => (float)($item['preco'] ?? 0),
                "currency_id" => "BRL"
            ];
        }

        $client = new PreferenceClient();
        $preference = $client->create([
            "items" => $mercadoPagoItems,
            "back_urls" => [
                "success" => route('sucesso.pagamento', [], true),
                "failure" => route('falha.pagamento', [], true),
                "pending" => route('pendente.pagamento', [], true),
            ],
            //"auto_return" => "approved"
        ]);

        return response()->json([
            'preferenceId' => $preference->id
        ]);
    }

    public function sucesso()
    {
        // Redireciona para index, JS mostra alert
        return redirect()->route('user.index');
    }

    public function falha()
    {
        return redirect()->route('user.index')->with('error', 'Pagamento falhou.');
    }

    public function pendente()
    {
        return redirect()->route('user.index')->with('warning', 'Pagamento pendente.');
    }
}
