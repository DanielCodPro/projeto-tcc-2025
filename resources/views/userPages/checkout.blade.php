@php
    use App\Models\Usuario;

    $usuario = null;
    if (session()->has('usuario_id')) {
        $usuario = Usuario::find(session('usuario_id'));
    }

@endphp

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<<<<<<< HEAD
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
=======
<body>
    <form method="POST" action="/pedido">
        @csrf
>>>>>>> 36bd991f81b5940443d60d151933eea6f0083c46

        <h1>Finalizar Pedido</h1>

<<<<<<< HEAD
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
=======
        @if ($usuario)
            <h2>Olá, {{ $usuario->nome }}</h2>
            <input type="hidden" name="nome" value="{{ $usuario->nome }}">
            <input type="hidden" name="email" value="{{ $usuario->email }}">
        @else
            <h2>Olá, visitante!</h2>
        @endif

        <h2>Escolha a mesa:</h2>
        <label>Mesa:</label>
        <select name="mesa" required>
            <option value="">Selecione a mesa</option>
            @for ($i = 1; $i <= 6; $i++)
                <option value="Mesa {{ $i }}">Mesa {{ $i }}</option>
            @endfor
        </select>

        <input type="hidden" name="itens" id="itens_pedido">

        <h2>Produtos escolhidos:</h2>
        <ul id="produtos"></ul>

        <h2>Valor total:</h2>
        <p id="valor_total"></p>

        <button type="submit">Finalizar Pedido</button>
    </form>

    <script>
        function atualizarCarrinho() {
            let carrinho = localStorage.getItem('carrinho');
            let produtosList = document.getElementById('produtos');
            let total = 0;

            produtosList.innerHTML = '';

            if (carrinho) {
                try {
                    let itens = JSON.parse(carrinho);
                    itens.forEach(item => {
                        let li = document.createElement('li');
                        li.textContent = `Quantidade(${item.quantidade}) - ${item.nome} - R$ ${item.preco.toFixed(2).replace('.', ',')}`;
                        produtosList.appendChild(li);
                        total += item.preco * item.quantidade;
                    });

                    document.getElementById('valor_total').textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
                    document.getElementById('itens_pedido').value = JSON.stringify(itens);
                } catch (error) {
                    console.error("Erro ao processar carrinho:", error);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            atualizarCarrinho();
        });
    </script>


</body>

</html>
>>>>>>> 36bd991f81b5940443d60d151933eea6f0083c46
