<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Casa dos Salgados</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif']
                    },
                    colors: {
                        laranja: '#fa5e00',
                        cinza1: '#2b2b2b',
                        cinza2: '#545454',
                        fundoMenu: '#fff7ed'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="font-poppins min-h-screen text-cinza1"
    style="background-image: url('/images/bg-header.jpg'); background-size: cover; background-position: center;">

    <!-- Header/Menu -->
    <header
        class="bg-white/80 shadow-lg rounded-b-3xl px-6 py-4 flex flex-col md:flex-row md:justify-between md:items-center gap-4 md:gap-0 backdrop-blur-sm">
        <a href="/index" class="flex items-center gap-4">
            <img src="/images/logo.png" alt="Logo"
                class="w-16 h-16 md:w-20 md:h-20 rounded-full border-4 border-white shadow-lg bg-white object-cover">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-laranja tracking-wide drop-shadow">Casa dos Salgados
                </h1>
                <span class="block text-cinza2 text-sm md:text-base font-medium mt-1">Sabor e tradição em cada
                    mordida</span>
            </div>
        </a>
    </header>

    <!-- Conteúdo principal -->
    <main class="max-w-7xl mx-auto px-4 md:px-8 py-10">

        <!-- Cardápio -->
        <section class="mb-14">
            <h2 class="text-3xl font-extrabold text-laranja mb-8 text-center tracking-tight">Nosso Cardápio</h2>
            <ul class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($produtos as $produto)
                    <li
                        class="bg-white/90 p-6 rounded-3xl shadow-lg hover:shadow-2xl transition-all flex flex-col justify-between border border-orange-100">
                        <div>
                            <h3 class="text-xl font-bold text-laranja mb-1">{{ $produto->nome }}</h3>
                            <p class="text-gray-700 font-semibold text-lg">R$
                                {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            @if ($produto->descricao)
                                <p class="text-sm text-gray-500 mt-1">{{ $produto->descricao }}</p>
                            @endif

                            @if ($produto->quantidade <= 0)
                                <p class="text-red-600 font-semibold mt-4">Produto em falta</p>
                            @else
                                <button onclick="adicionarAoCarrinho('{{ $produto->nome }}', {{ $produto->preco }})"
                                    class="mt-6 bg-laranja hover:bg-white hover:text-laranja border-2 border-laranja text-white px-6 py-2 rounded-full font-bold shadow transition-all">
                                    <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                                </button>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>

        <!-- Carrinho -->
        <section class="mb-14 max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold text-laranja mb-4 text-center">Carrinho de Compras</h2>
            <ul id="carrinho" class="bg-white/90 p-6 rounded-2xl shadow space-y-3 text-base border border-orange-100">
            </ul>
            <div class="flex justify-between items-center mt-6">
                <p id="total" class="text-xl font-extrabold text-green-600">Total: R$ 0,00</p>
                <button onclick="limparCarrinho()" class="text-sm text-red-500 hover:underline font-semibold">Limpar
                    Carrinho</button>
            </div>
        </section>

        <!-- Botões de Ação -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 mt-8">
            <a href="/checkout"
                class="bg-laranja text-white font-bold px-8 py-4 rounded-full shadow-lg hover:bg-white hover:text-laranja border-2 border-laranja transition-all disabled:opacity-50 disabled:pointer-events-none text-lg">
                <i class="fas fa-check mr-2"></i>Checar Pedido
            </a>
            <a href="/index"
                class="text-cinza2 border-2 border-cinza2 px-8 py-4 rounded-full font-bold hover:bg-cinza2 hover:text-white transition-all text-lg">
                <i class="fas fa-home mr-2"></i>Voltar à Página Inicial
            </a>
        </div>
    </main>

    <!-- Scripts -->
    <script>
        function adicionarAoCarrinho(nome, preco, quantidade = 1) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            let item = carrinho.find(i => i.nome === nome);
            if (item) {
                item.quantidade += quantidade;
            } else {
                carrinho.push({ nome, preco, quantidade });
            }
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            atualizarCarrinho();
        }

        function removerItemDoCarrinho(nome) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            let item = carrinho.find(i => i.nome === nome);
            if (item && item.quantidade > 1) {
                item.quantidade -= 1;
            } else {
                carrinho = carrinho.filter(i => i.nome !== nome);
            }
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            atualizarCarrinho();
        }

        function limparCarrinho() {
            localStorage.removeItem('carrinho');
            atualizarCarrinho();
        }

        function atualizarCarrinho() {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            let html = '';
            let total = 0;
            carrinho.forEach(item => {
                html += `<li class="flex justify-between items-center border-b pb-2 last:border-b-0">
                    <span class="font-semibold">${item.nome} <span class="text-gray-500 font-normal">(x${item.quantidade})</span></span>
                    <div class="flex items-center gap-2">
                        <span class="text-laranja font-bold">R$ ${item.preco.toFixed(2).replace('.', ',')}</span>
                        <button onclick="removerItemDoCarrinho('${item.nome}')" class="text-red-600 hover:underline text-xs font-semibold">Remover</button>
                    </div>
                </li>`;
                total += item.preco * item.quantidade;
            });

            document.getElementById('carrinho').innerHTML = html || '<li class="text-gray-500">Seu carrinho está vazio.</li>';
            document.getElementById('total').innerText = 'Total: R$ ' + total.toFixed(2).replace('.', ',');

            const checkoutBtn = document.querySelector('a[href="/checkout"]');
            if (carrinho.length === 0) {
                checkoutBtn.classList.add('opacity-50', 'pointer-events-none');
            } else {
                checkoutBtn.classList.remove('opacity-50', 'pointer-events-none');
            }
        }

        window.onload = atualizarCarrinho;
    </script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a2d5f8eafd.js" crossorigin="anonymous"></script>
</body>

</html>