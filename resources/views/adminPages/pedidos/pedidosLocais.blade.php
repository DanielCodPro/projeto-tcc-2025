<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pedidos Locais</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f8f9fa] min-h-screen py-10 px-4 font-sans">
  <div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold text-orange-500 text-center mb-10">Pedidos Locais</h1>

    @foreach ($pedidos as $pedido)
    <div class="bg-white border border-gray-300 shadow-md rounded-lg p-6 mb-6">
      <h3 class="text-lg font-bold mb-2">ID do Pedido - #{{ $pedido->id }}</h3>
      <p class="mb-1"><strong>Cliente:</strong> {{ $pedido->nome_cliente }}</p>
      <p class="mb-3"><strong>Mesa:</strong> {{ $pedido->mesa }}</p>

      <p class="font-semibold">Itens:</p>
      <ul class="list-disc list-inside text-gray-700 mb-3">
      @php $itens = json_decode($pedido->itens_pedido, true); @endphp

      @if (is_array($itens))
      @foreach ($itens as $item)
      <li>{{ $item['nome'] }} - R$ {{ number_format($item['preco'], 2, ',', '.') }} -
      Quantidade({{ $item['quantidade'] }})</li>
      @endforeach
    @else
      <li class="text-red-500">Erro ao carregar itens</li>
    @endif
      </ul>

      <p id="total" class="font-bold text-orange-500 mb-4">Total: R$ 0,00</p>

      <form method="POST" action="/pedidos/{{ $pedido->id }}/status" class="space-y-3">
      @csrf
      <label for="status" class="font-semibold">Status:</label>
      <select name="status" class="w-full p-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-300">
        <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
        <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
        <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
        <option value="entregue" @selected($pedido->status == 'entregue')>Entregue</option>
      </select>

      <button type="submit"
        class="w-full bg-orange-400 text-white font-semibold py-3 rounded-md hover:bg-orange-500 transition duration-300">
        Atualizar
      </button>
      </form>
    </div>
  @endforeach

    <button onclick="window.location.href='{{ url('admin') }}'"
      class="w-full bg-gray-800 text-white font-semibold py-3 rounded-md hover:bg-gray-700 transition duration-300 mt-6">
      Voltar
    </button>
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