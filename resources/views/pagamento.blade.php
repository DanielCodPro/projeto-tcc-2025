<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title> 
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-900 via-black to-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500 text-center w-96">
        <h1 class="text-2xl font-bold text-orange-500 mb-4">Pagamento</h1>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <button id="checkout-button" class="w-full bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold">Pagar</button>
    </div>
    
    <script>
        const mp = new MercadoPago("{{ env('MERCADO_PAGO_PUBLIC_KEY') }}");
        const checkout = mp.checkout({
            preference: {
                id: "{{ $preference->id }}"
            }
        });

        document.getElementById('checkout-button').addEventListener('click', function() {
            checkout.open();
        });
    </script>
</body>
</html>

<!--
    Este código é um exemplo de uma página de pagamento utilizando o Mercado Pago.
    O botão "Pagar" inicia o processo de checkout com a preferência gerada no backend.
    O SDK do Mercado Pago é utilizado para facilitar a integração com o sistema de pagamentos.