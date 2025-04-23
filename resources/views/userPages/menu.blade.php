<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
<h1>Menu</h1>

<ul>
    @foreach ($produtos as $produto)
        <li>
            {{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}
            @if ($produto->descricao)
                <p>{{ $produto->descricao }}</p>
            @endif
            @if ($produto->quantidade <= 0)
                <span style="color: red;">(Produto em falta)</span>
            @else
                <button onclick="adicionarAoCarrinho('{{ $produto->nome }}', {{ $produto->preco }})">
                    Adicionar
                </button>
            @endif
        </li>
    @endforeach
</ul>


    <a href="/checkout">Finalizar Pedido</a>



<script>
    function adicionarAoCarrinho(nome, preco) {
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        carrinho.push({ nome, preco });
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
    }
</script>
</body>
</html>
