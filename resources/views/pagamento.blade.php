<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title> 
</head>
<body>
    <h1>Pagamento</h1>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <button id="checkout-button">Pagar</button>
    
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
