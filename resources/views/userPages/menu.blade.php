<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Casa dos Salgados</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-pattern {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="font-poppins min-h-screen text-cinza1 bg-pattern">

    <!-- Header/Menu -->
    <header
        class="bg-white/90 shadow-lg rounded-b-3xl px-6 py-4 flex flex-col md:flex-row md:justify-between md:items-center gap-4 md:gap-0 backdrop-blur-sm z-10">
        <a href="/index" class="flex items-center gap-4">
            <img src="/images/logo.png" alt="Logo"
                class="w-16 h-16 md:w-20 md:h-20 rounded-full border-4 border-gray-10 shadow-lg bg-white object-cover">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-wide drop-shadow">Casa dos
                    Salgados
                </h1>
                <span class="block text-cinza2 text-sm md:text-base font-medium mt-1">Sabor e tradição em cada
                    mordida</span>
            </div>
        </a>
        <nav class="flex items-center gap-6">
            <a href="/index"
                class="text-white font-semibold px-4 py-2 rounded-full bg-gray-400 hover:bg-orange-400 transition-colors shadow">
                <i class="fas fa-home mr-2"></i>Voltar à Página Inicial
            </a>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-4 md:px-8 py-10 flex flex-col lg:flex-row gap-10">

        <!-- Cardápio -->
        <section class="flex-1">
            <h2 class="text-4xl font-extrabold mb-10 text-center tracking-tight drop-shadow">Cardápio
            </h2>

            <!-- Seção Alimentos -->
            <h3 class="text-2xl font-bold text-cinza2 mb-6 mt-8 border-l-4 border-orange-400 pl-4">Alimentos</h3>
            <ul class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($produtos->where('tipo', 'alimento') as $produto)
                    <li
                        class="bg-white/95 p-6 rounded-3xl shadow-xl hover:shadow-2xl transition-all flex flex-col items-center border border-orange-100 h-full">
                        @if ($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                                class="w-28 h-28 object-cover rounded-full border-4 border-laranja shadow mb-4">
                        @else
                            <div
                                class="w-28 h-28 flex items-center justify-center bg-gray-100 rounded-full border-4 border-gray-200 mb-4 text-gray-400">
                                <i class="fas fa-utensils text-3xl"></i>
                            </div>
                        @endif
                        <h3 class="text-xl font-bold text-laranja mb-1 text-center">{{ $produto->nome }}</h3>
                        <p class="text-gray-700 font-semibold text-lg mb-1">R$
                            {{ number_format($produto->preco, 2, ',', '.') }}
                        </p>
                        @if ($produto->descricao)
                            <p class="text-sm text-gray-500 mb-2 text-center">{{ $produto->descricao }}</p>
                        @endif

                        @if ($produto->quantidade <= 0)
                            <p class="text-red-600 font-semibold mt-4">Produto em falta</p>
                        @else
                            <button onclick="adicionarAoCarrinho('{{ $produto->nome }}', {{ $produto->preco }})"
                                class="mt-4 bg-gray-400 hover:bg-orange-400 hover:text-white border-2 border-gray-100 text-white px-6 py-2 rounded-full font-bold shadow transition-all">
                                <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                            </button>
                        @endif
                    </li>
                @empty
                    <li class="text-white italic col-span-full text-center">Nenhum alimento disponível.</li>
                @endforelse
            </ul>

            <!-- Seção Bebidas -->
            <h3 class="text-2xl font-bold text-cinza2 mb-6 mt-12 border-l-4 border-orange-400 pl-4">Bebidas</h3>
            <ul class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($produtos->where('tipo', 'bebida') as $produto)
                    <li
                        class="bg-white/95 p-6 rounded-3xl shadow-xl hover:shadow-2xl transition-all flex flex-col items-center border border-orange-100 h-full">
                        @if ($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                                class="w-28 h-28 object-cover rounded-full border-4 shadow mb-4">
                        @else
                            <div
                                class="w-28 h-28 flex items-center justify-center bg-gray-100 rounded-full border-4 border-gray-200 mb-4 text-gray-400">
                                <i class="fas fa-glass-martini-alt text-3xl"></i>
                            </div>
                        @endif
                        <h3 class="text-xl font-bold text-laranja mb-1 text-center">{{ $produto->nome }}</h3>
                        <p class="text-gray-700 font-semibold text-lg mb-1">R$
                            {{ number_format($produto->preco, 2, ',', '.') }}
                        </p>
                        @if ($produto->descricao)
                            <p class="text-sm text-gray-500 mb-2 text-center">{{ $produto->descricao }}</p>
                        @endif

                        @if ($produto->quantidade <= 0)
                            <p class="text-red-600 font-semibold mt-4">Produto em falta</p>
                        @else
                            <button onclick="adicionarAoCarrinho('{{ $produto->nome }}', {{ $produto->preco }})"
                                class="mt-4 bg-gray-400 hover:bg-orange-400 hover:text-white border-2 border-gray-100 text-white px-6 py-2 rounded-full font-bold shadow transition-all">
                                <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                            </button>
                        @endif
                    </li>
                @empty
                    <li class="text-white italic col-span-full text-center">Nenhuma bebida disponível.</li>
                @endforelse
            </ul>
        </section>

        <!-- Carrinho (fixo em telas grandes) -->
        <aside class="lg:w-96 w-full lg:sticky lg:top-20">
            <section class="mb-14 bg-white/95 p-8 rounded-3xl shadow-xl border border-orange-100">
                <h2 class="text-2xl font-bold text-laranja mb-4 text-center"><i
                        class="fas fa-shopping-cart mr-2"></i>Carrinho de Compras</h2>
                <ul id="carrinho" class="space-y-3 text-base">
                </ul>
                <div class="flex justify-between items-center mt-6">
                    <p id="total" class="text-xl font-extrabold text-green-600">Total: R$ 0,00</p>
                    <button onclick="limparCarrinho()" class="text-sm text-red-500 hover:underline font-semibold">Limpar
                        Carrinho</button>
                </div>
            </section>
            <a href="/checkout"
                class="block w-full text-cinza2 border-2 border-cinza2 px-8 py-4 rounded-full font-bold hover:bg-cinza2 hover:text-orange-400 transition-all text-lg text-center">
                <i class="fas fa-home mr-2"></i>Checar Pedido
            </a>
        </aside>
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
    </div>
</body>

</html>