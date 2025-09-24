<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Casa dos Salgados</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/ícone.png') }}">

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
    <header class="sticky top-0 z-50 bg-white shadow-md px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="/images/logo.png" alt="Logo"
                class="w-14 h-14 rounded-full border-2 border-gray-200 shadow bg-white object-cover">
            <div>
                <h1 class="text-2xl font-extrabold tracking-wide text-gray-800">Casa dos Salgados</h1>
                <span class="block text-gray-500 text-xs font-medium">Sabor e tradição em cada mordida</span>
            </div>
        </div>
        <nav>
            <a href="/index"
                class="text-white font-semibold px-4 py-2 rounded-full bg-gray-400 hover:bg-orange-400 transition-colors shadow">
                <i class="fa fa-home" aria-hidden="true"></i>Voltar
            </a>
        </nav>
    </header>

    <!-- Conteúdo -->
    <main id="conteudo" class="max-w-7xl mx-auto px-4 md:px-8 py-10 flex flex-col lg:flex-row gap-10 transition-all">

        <!-- Cardápio -->
        <section class="flex-1">
            <h2 class="text-4xl font-extrabold mb-10 text-center tracking-tight drop-shadow">Cardápio
            </h2>

            <!-- Seção Alimentos Fritos -->
            <h3 class="text-2xl font-bold text-cinza2 mb-6 mt-8 border-l-4 border-orange-400 pl-4">Frito</h3>
            <ul class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($produtos->where('tipo', 'frito') as $produto)
                    <li
                        class="bg-orange-50 p-6 rounded-3xl shadow-xl hover:shadow-2xl transition-all flex flex-col items-center border border-orange-200 h-full">

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

                        <div class="flex flex-col justify-end mt-auto w-full">
                            <div class="flex items-center justify-between mt-4 gap-2">
                                <input type="number" min="20" value="20"
                                    class="quantidade w-16 text-center border border-gray-300 rounded-full px-2 py-1 text-sm" />
                                <button
                                    onclick="adicionarProduto(this, '{{ $produto->nome }}', {{ $produto->preco }}, '{{ $produto->tipo }}')"
                                    class="flex-1 bg-gray-400 hover:bg-orange-400 hover:text-white border-2 border-gray-100 text-white px-4 py-2 rounded-full font-bold shadow transition-all text-sm">
                                    <i class="fas fa-cart-plus mr-2"></i>Adicionar
                                </button>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="text-white italic col-span-full text-center">Nenhum alimento disponível.</li>
                @endforelse
            </ul>

            <!-- Seção Alimentos Assados -->
            <h3 class="text-2xl font-bold text-cinza2 mb-6 mt-12 border-l-4 border-orange-400 pl-4">Assado</h3>
            <ul class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($produtos->where('tipo', 'assado') as $produto)
                    <li
                        class="bg-orange-50 p-6 rounded-3xl shadow-xl hover:shadow-2xl transition-all flex flex-col items-center border border-orange-200 h-full">

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

                        <div class="flex flex-col justify-end mt-auto w-full">
                            <div class="flex items-center justify-between mt-4 gap-2">
                                <input type="number" min="1" value="1"
                                    class="quantidade w-16 text-center border border-gray-300 rounded-full px-2 py-1 text-sm" />
                                <button onclick="adicionarProduto(this, '{{ $produto->nome }}', {{ $produto->preco }})"
                                    class="flex-1 bg-gray-400 hover:bg-orange-400 hover:text-white border-2 border-gray-100 text-white px-4 py-2 rounded-full font-bold shadow transition-all text-sm">
                                    <i class="fas fa-cart-plus mr-2"></i>Adicionar
                                </button>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="text-white italic col-span-full text-center">Nenhum alimento assado disponível.</li>
                @endforelse
            </ul>

            <!-- Seção Bebidas -->
            <h3 class="text-xl md:text-2xl font-bold text-cinza2 mb-4 mt-10 border-l-4 border-orange-400 pl-3">Bebidas
            </h3>
            <ul class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($produtos->where('tipo', 'bebida') as $produto)
                    <li
                        class="bg-orange-50 p-4 md:p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all flex flex-col items-center border border-orange-200 h-full">

                        @if ($produto->imagem)
                            <img src="{{ asset("storage/{$produto->imagem}") }}" alt="{{ $produto->nome }}"
                                class="w-24 h-24 md:w-28 md:h-28 object-cover rounded-full border-4 border-laranja shadow mb-3">
                        @else
                            <div
                                class="w-24 h-24 md:w-28 md:h-28 flex items-center justify-center bg-gray-100 rounded-full border-4 border-gray-200 mb-3 text-gray-400">
                                <i class="fas fa-utensils text-2xl md:text-3xl"></i>
                            </div>
                        @endif

                        <h3 class="text-lg md:text-xl font-bold text-laranja mb-1 text-center">{{ $produto->nome }}</h3>
                        <p class="text-gray-700 font-semibold text-base md:text-lg mb-1">R$
                            {{ number_format($produto->preco, 2, ',', '.') }}
                        </p>

                        @if ($produto->descricao)
                            <p class="text-xs md:text-sm text-gray-500 mb-2 text-center">{{ $produto->descricao }}</p>
                        @endif

                        <div class="flex flex-col justify-end mt-auto w-full">
                            <div class="flex items-center justify-between mt-3 gap-2">
                                <input type="number" min="1" value="1"
                                    class="quantidade w-14 md:w-16 text-center border border-gray-300 rounded-full px-2 py-1 text-xs md:text-sm" />
                                <button onclick="adicionarProduto(this, '{{ $produto->nome }}', {{ $produto->preco }})"
                                    class="flex-1 bg-gray-400 hover:bg-orange-400 hover:text-white border-2 border-gray-100 text-white px-3 md:px-4 py-2 rounded-full font-bold shadow transition-all text-xs md:text-sm">
                                    <i class="fas fa-cart-plus mr-2"></i>Adicionar
                                </button>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="text-white italic col-span-full text-center">Nenhuma bebida disponível.</li>
                @endforelse
            </ul>
        </section>
    </main>

    <!-- Footer Carrinho -->
    <footer id="footerCarrinho"
        class="fixed bottom-0 left-0 w-full bg-white border-t-4 border-orange-400 shadow-lg z-40 max-h-[45vh] overflow-y-auto">
        <div class="max-w-6xl mx-auto px-6 py-5 flex flex-col md:flex-row md:items-start md:justify-between gap-6">

            <!-- Lista do Carrinho -->
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fas fa-shopping-cart text-orange-500 text-xl"></i>
                    <h2 class="text-lg md:text-xl font-bold text-orange-600">Seu Carrinho</h2>
                </div>
                <ul id="carrinho" class="divide-y divide-gray-200 text-base max-h-[25vh] overflow-y-auto pr-2"></ul>
            </div>

            <!-- Total e Ações -->
            <div class="flex flex-col md:items-end justify-between gap-4 min-w-[260px]">
                <p id="total" class="text-2xl font-extrabold text-green-600 whitespace-nowrap">Total: R$ 0,00</p>
                <div class="flex flex-wrap md:flex-nowrap gap-3 w-full md:w-auto">
                    <button onclick="limparCarrinho()"
                        class="text-sm font-semibold text-red-500 hover:text-red-600 hover:underline transition">Limpar</button>
                    <a href="/checkout"
                        class="flex items-center justify-center gap-2 px-6 py-2 rounded-full font-bold text-white bg-orange-500 hover:bg-orange-600 shadow-md transition-all">
                        <i class="fas fa-receipt"></i> Finalizar Pedido
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        @if (!session('usuario_id'))
            localStorage.removeItem('carrinho');
        @endif

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

        function adicionarProduto(btn, nome, preco, tipo) {
            const input = btn.parentElement.querySelector('.quantidade');
            const quantidade = parseInt(input.value);
            adicionarAoCarrinho(nome, preco, quantidade);
            if (tipo === 'frito') {
                input.value = 20; // Reseta para 20 se for frito
            } else {
                input.value = 1; // Reseta para 1 se não for frito
            }
        }

        // 🔑 Ajusta espaço inferior dinamicamente conforme altura do footer
        function ajustarEspaco() {
            const footer = document.getElementById("footerCarrinho");
            const main = document.getElementById("conteudo");
            if (footer && main) {
                const alturaFooter = footer.offsetHeight;
                main.style.paddingBottom = alturaFooter + 30 + "px"; // 30px extra de respiro
            }
        }

        window.onload = () => {
            atualizarCarrinho();
            ajustarEspaco();
        };
        window.onresize = ajustarEspaco;
    </script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a2d5f8eafd.js" crossorigin="anonymous"></script>
</body>

</html>