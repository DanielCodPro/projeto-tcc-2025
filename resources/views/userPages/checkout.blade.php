<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-900 via-black to-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-96 border border-orange-500">
        <h1 class="text-2xl font-bold text-center mb-4 text-orange-500">Finalizar Pedido</h1>
        <form method="POST" action="/pedido" class="space-y-4">
            @csrf
            <div>
                <label class="block text-white">Nome:</label>
                <input type="text" name="nome" required class="w-full p-2 rounded-lg bg-gray-700 text-white border border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <label class="block text-white">Email:</label>
                <input type="email" name="email" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <label class="block text-white">Mesa:</label>
                <input type="text" name="mesa" required class="w-full p-2 rounded-lg bg-gray-700 text-white border border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            <input type="hidden" name="itens" id="itens_pedido">
            <button type="submit" class="w-full bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold">Enviar Pedido</button>
        </form>
    </div>


    <script>
        let carrinho = localStorage.getItem('carrinho');

        if (carrinho) {
            try {
                let itens = JSON.parse(carrinho); // Converte para objeto
                document.getElementById('itens_pedido').value = JSON.stringify(itens); // Converte de volta para JSON limpo
            } catch (error) {
                console.error("Erro ao processar carrinho:", error);
                document.getElementById('itens_pedido').value = "[]"; // Evita erros
            }
        }
        localStorage.removeItem('carrinho');
    </script>
</body>
</html>
<!--
    Este código é um exemplo de uma página de checkout para um pedido em um restaurante.
    O formulário coleta informações do cliente, como nome, email e mesa.
    Os itens do carrinho são enviados como um campo oculto no formulário.
    O carrinho é recuperado do localStorage, processado e enviado ao servidor.
    Após o envio, o carrinho é limpo do localStorage.
