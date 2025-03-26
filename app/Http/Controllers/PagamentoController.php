<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;

class PagamentoController extends Controller
{
    public function checkout()
    {
        \MercadoPago\SDK::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));

        $preference = new \MercadoPago\Preference();

        $item = new \MercadoPago\Item();
        $item->title = "Pedido na Salgadaria";
        $item->quantity = 1;
        $item->unit_price = 50; // Defina o valor real do pedido

        $preference->items = [$item];

        $preference->back_urls = [
            "success" => url('/pagamento/sucesso'),
            "failure" => url('/pagamento/falha'),
            "pending" => url('/pagamento/pendente')
        ];
        $preference->auto_return = "approved";
        $preference->save();

        return view('pagamento', ['preference' => $preference]);
    }

    public function sucesso()
    {
        return "Pagamento realizado com sucesso!";
    }

    public function falha()
    {
        return "O pagamento falhou. Tente novamente.";
    }

    public function pendente()
    {
        return "O pagamento está pendente.";
    }
}
