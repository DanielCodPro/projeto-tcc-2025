<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pedidos Delivery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-orange-600 text-center mb-8">Pedidos Delivery</h1>

        @foreach ($pedidos as $pedido)
            <div class="bg-white shadow-lg rounded-xl p-6 mb-6 border-l-4 border-orange-500">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Pedido #{{ $pedido->id }}</h3>
                <p class="mb-1"><span class="font-semibold">Cliente:</span> {{ $pedido->nome_cliente }}</p>
                <p class="mb-1"><span class="font-semibold">Endereço:</span> {{ $pedido->endereco }}</p>
                <p class="mb-4"><span class="font-semibold">Telefone:</span> {{ $pedido->telefone }}</p>

                <div class="mb-4">
                    <p class="font-semibold mb-1">Itens:</p>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        @php $itens = json_decode($pedido->itens_pedido, true); @endphp

                        @if (is_array($itens))
                            @foreach ($itens as $item)
                                <li>{{ $item['nome'] }} - R$ {{ number_format($item['preco'], 2, ',', '.') }} -
                                    Quantidade({{ $item['quantidade'] }})</li>
                            @endforeach
                        @else
                            <li class="text-red-600">Erro ao carregar itens</li>
                        @endif
                    </ul>
                </div>

                <p id="total" class="text-base font-bold text-orange-600 mb-4">Total: R$ 0,00</p>

                <form method="POST" action="/pedidos/{{ $pedido->id }}/status"
                    class="flex flex-col sm:flex-row gap-3 sm:items-center">
                    @csrf
                    <label for="status" class="font-medium text-sm">Status:</label>
                    <select name="status"
                        class="flex-1 border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
                        <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
                        <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
                        <option value="entregue" @selected($pedido->status == 'entregue')>Entregue (Excluir)</option>
                    </select>
                    <button type="submit"
                        class="bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-orange-600 transition-all shadow-md">
                        Atualizar
                    </button>
                </form>
            </div>
        @endforeach

        <div class="text-center mt-10">
            <button onclick="window.location.href='{{ url('admin') }}'"
                class="bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-700 transition duration-300 shadow-md">
                Voltar
            </button>
        </div>
    </div>

    <script>
        function totalPrecoPedido() {
            const pedidos = document.querySelectorAll('div');
            pedidos.forEach(pedido => {
                const itens = pedido.querySelectorAll('li');
                let total = 0;
                itens.forEach(item => {
                    const precoMatch = item.textContent.match(/R\$ ([\d,]+)/);
                    const qtdMatch = item.textContent.match(/Quantidade\((\d+)\)/);
                    if (precoMatch && qtdMatch) {
                        const preco = parseFloat(precoMatch[1].replace(',', '.'));
                        const quantidade = parseInt(qtdMatch[1]);
                        total += preco * quantidade;
                    }
                });
                const totalElement = pedido.querySelector('#total');
                if (totalElement) {
                    totalElement.innerHTML = `<strong>Total:</strong> R$ ${total.toFixed(2).replace('.', ',')}`;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', totalPrecoPedido);
    </script>
</body>

</html>