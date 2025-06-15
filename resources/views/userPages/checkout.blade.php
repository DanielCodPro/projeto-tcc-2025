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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<script>
    
</script>

<body
    class="min-h-screen flex items-center justify-center py-8"
    style="background-image: url('/images/bg.jpg'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-2xl border border-gray p-10 z-0">
        <h1 class="text-3xl font-extrabold text-center text-gray-700 mb-6 tracking-widee">Finalizar Pedido</h1>

        <form method="POST" action="/pedido" class="space-y-6">
            @csrf

            @if ($usuario)
                <div class="text-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">Olá, <span
                            class="text-yellow-500">{{ $usuario->nome }}</span></h2>
                </div>
                <input type="hidden" name="nome" value="{{ $usuario->nome }}">
                <input type="hidden" name="email" value="{{ $usuario->email }}">
            @else
                <div class="text-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">Olá, visitante!</h2>
                </div>
            @endif

            <div>
                <label for="tipo_pedido" class="block text-sm font-bold text-yellow-500 mb-1">Tipo de Pedido:</label>
                <select name="tipo_pedido" id="tipo_pedido" required
                    class="w-full rounded-lg border border-gray p-2 focus:ring-2 focus:ring-yellow-400">
                    <option value="local">Presencial</option>
                    <option value="delivery">Delivery</option>
                </select>
            </div>

            <div id="mesa_section">
                <label for="mesa" class="block text-sm font-bold text-yellow-500 mb-1">Escolha a mesa:</label>
                <select name="mesa" id="mesa" required
                    class="w-full rounded-lg border border-gray p-2 focus:ring-2 focus:ring-yellow-400">
                    <option value="">Selecione a mesa</option>
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="Mesa {{ $i }}">Mesa {{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div id="info_delivery" style="display: none;">
                <label for="endereco" class="block text-sm font-bold text-yellow-700 mb-1">Endereço:</label>
                <input type="text" name="endereco" id="endereco"
                    class="w-full rounded-lg border border-gray p-2 mb-2 focus:ring-2 focus:ring-yellow-400">

                <label for="telefone" class="block text-sm font-bold text-yellow-700 mb-1">Telefone:</label>
                <input type="text" name="telefone" id="telefone"
                    class="w-full rounded-lg border border-gray p-2 focus:ring-2 focus:ring-yellow-400">
            </div>

            <input type="hidden" name="itens" id="itens_pedido">

            <div>
                <h2 class="text-lg font-bold text-yellow-500 mb-2">Produtos escolhidos:</h2>
                <ul id="produtos" class="bg-gray-100 rounded-lg p-4 mb-2 border border-gray space-y-2"></ul>
            </div>

            <div class="flex items-center justify-between">
                <h2 class="text-lg font-extrabold text-gray-700">Valor total:</h2>
                <p id="valor_total" class="text-xl font-extrabold text-green-600"></p>
            </div>

            <button type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg shadow-lg transition duration-300 text-lg">
                Finalizar Pedido
            </button>
        </form>
    </div>

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
                        li.className = "flex justify-between items-center bg-white rounded px-3 py-2 shadow-sm border border-yellow-100";
                        li.innerHTML = `<span class="font-semibold text-gray-700">${item.nome}</span>
                                        <span class="text-gray-500">x${item.quantidade}</span>
                                        <span class="font-bold text-yellow-600">R$ ${item.preco.toFixed(2).replace('.', ',')}</span>`;
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

        const tipoPedido = document.getElementById('tipo_pedido');
        tipoPedido.addEventListener('change', function () {
            let mesaSection = document.getElementById('mesa_section');
            let deliveryInfo = document.getElementById('info_delivery');

            if (this.value === 'delivery') {
                mesaSection.style.display = 'none';
                deliveryInfo.style.display = 'block';
                document.getElementById('endereco').required = true;
                document.getElementById('telefone').required = true;
            } else {
                mesaSection.style.display = 'block';
                deliveryInfo.style.display = 'none';
                document.getElementById('endereco').required = false;
                document.getElementById('telefone').required = false;
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            atualizarCarrinho();
            // Inicializa corretamente os campos no carregamento
            if (tipoPedido.value === 'delivery') {
                document.getElementById('mesa_section').style.display = 'none';
                document.getElementById('info_delivery').style.display = 'block';
            }
        });

        document.querySelector('form').addEventListener('submit', function (event) {
            let itens = localStorage.getItem('carrinho');
            if (!itens || JSON.parse(itens).length === 0) {
                alert('Seu carrinho está vazio!');
                event.preventDefault();
                return;
            }
            localStorage.removeItem('carrinho');
            alert('Pedido realizado com sucesso!');
        });
    </script>
</body>

</html>