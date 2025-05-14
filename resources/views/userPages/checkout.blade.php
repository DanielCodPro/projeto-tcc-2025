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
    <title>checkout</title>
</head>

<body>
    <form method="POST" action="/pedido">
        @csrf

        <h1>Finalizar Pedido</h1>

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