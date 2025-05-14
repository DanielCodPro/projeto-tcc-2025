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

    <!-- Exibe o carrinho de compras -->
    <h2>Carrinho de Compras</h2>
    <ul id="carrinho"></ul>
    <h2>Total do Carrinho</h2>
    <p id="total">Total: R$ 0,00</p>

    <!-- Botão para finalizar o pedido -->
    <a href="/checkout">Finalizar Pedido</a>

    <script>
        //remove itens do carrinho ao reinicar a página
        window.addEventListener('beforeunload', function () {
            localStorage.removeItem('carrinho');
        });

        function adicionarAoCarrinho(nome, preco, quantidade = 1) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            let quantidadeExistente = carrinho.find(item => item.nome === nome);
            if (quantidadeExistente) {
                quantidadeExistente.quantidade += quantidade;
            } else {
                quantidadeExistente = { nome, preco, quantidade };
                carrinho.push(quantidadeExistente);
            }
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            atualizarCarrinho();
        }

        function atualizarCarrinho() {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            let carrinhoHTML = '';
            let total = 0;

            carrinho.forEach(item => {
                carrinhoHTML += `<li>${item.nome} - R$ ${item.preco.toFixed(2).replace('.', ',')} quantidade:${item.quantidade}</li>`;
                carrinhoHTML += `<button onclick="removerItemDoCarrinho('${item.nome}')">Remover</button>`;
                total += item.preco * item.quantidade;
            });

            document.getElementById('carrinho').innerHTML = carrinhoHTML || '<li>Seu carrinho está vazio.</li>';
            document.getElementById('total').innerText = 'Total: R$ ' + total.toFixed(2).replace('.', ',');

            //desabilita o botão de finalizar pedido se o carrinho estiver vazio
            const finalizarPedido = document.querySelector('a[href="/checkout"]');
            if (carrinho.length === 0) {
                finalizarPedido.style.pointerEvents = 'none';
                finalizarPedido.style.color = 'gray';
            } else {
                finalizarPedido.style.pointerEvents = 'auto';
                finalizarPedido.style.color = 'black';
            }
        }

        function removerItemDoCarrinho(nome) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            //removendo apenas um item 
            let item = carrinho.find(item => item.nome === nome);
            if (item && item.quantidade > 1) {
                item.quantidade -= 1;
            } else {
                carrinho = carrinho.filter(item => item.nome !== nome);
            }
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            atualizarCarrinho();
        }

        window.onload = atualizarCarrinho;
    </script>

    </script>
</body>

</html>