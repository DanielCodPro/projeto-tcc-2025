<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pedidos Locais - Casa dos Salgados</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media print {
      body * {
        visibility: hidden !important;
      }

      .print-comanda,
      .print-comanda * {
        visibility: visible !important;
      }

      .print-comanda {
        position: absolute !important;
        left: 0;
        top: 0;
        width: 100vw;
        min-height: 100vh;
        background: white;
        z-index: 9999;
        box-shadow: none;
        padding: 2rem;
      }
    }
  </style>
  <link rel="icon" type="image/png" href="{{ asset('images/ícone.png') }}">
</head>

<body class="text-gray-800 font-sans" style="background-image: url('/images/bg.jpg');">
  <div class="fixed inset-0 bg-black bg-opacity-20 z-0"></div>
  <div class="container mx-auto p-6 z-10 relative">
    <h1 class="text-3xl font-bold text-orange-600 text-center mb-8">Pedidos Locais</h1>

    @foreach ($pedidos as $pedido)
      <div class="bg-white shadow-lg rounded-xl p-6 mb-6 border-l-4 border-orange-500">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Pedido #{{ $pedido->id }}</h3>
        <p class="mb-1"><span class="font-semibold">Cliente:</span> {{ $pedido->nome_cliente }}</p>
        <p class="mb-4"><span class="font-semibold">Mesa:</span> {{ $pedido->mesa }}</p>

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

        <p id="total-{{ $pedido->id }}" class="text-base font-bold text-orange-600 mb-4">
          Total: R$
          {{ is_array($itens) ? number_format(collect($itens)->sum(function ($i) {
      return $i['preco'] * $i['quantidade']; }), 2, ',', '.') : '0,00' }}
        </p>

        <form method="POST" action="/pedidos/{{ $pedido->id }}/status"
          class="flex flex-col sm:flex-row gap-3 sm:items-center">
          @csrf
          <label for="status" class="font-medium text-sm">Status:</label>
          <select name="status"
            class="flex-1 border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
            <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
            <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
            <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
            <option value="entregue" @selected($pedido->status == 'entregue')>Entregue</option>
          </select>
          <button type="submit"
            class="bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-orange-600 transition-all shadow-md">
            Atualizar
          </button>
          <!-- Imprimindo o Pedido (comanda) -->
          <button type="button" onclick="imprimirComanda({{ $pedido->id }})"
            class="bg-green-500 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-green-600 transition-all shadow-md">
            Imprimir Pedido
          </button>
        </form>
      </div>

      <!-- Bloco de impressão personalizado -->
      <div class="print-comanda hidden print:block bg-white rounded-lg shadow text-black"
        data-pedido-id="{{ $pedido->id }}" style="display:none;">
        <h2 class="text-2xl font-bold text-orange-600 mb-4">Comanda - Pedido #{{ $pedido->id }}</h2>
        <p><strong>Cliente:</strong> {{ $pedido->nome_cliente }}</p>
        <p><strong>Mesa:</strong> {{ $pedido->mesa }}</p>
        <hr class="my-4">
        <p class="font-semibold mb-1">Itens:</p>
        <ul class="list-disc list-inside mb-4">
          @if (is_array($itens))
            @foreach ($itens as $item)
              <li>{{ $item['nome'] }} - R$ {{ number_format($item['preco'], 2, ',', '.') }} - Qtd: {{ $item['quantidade'] }}
              </li>
            @endforeach
          @else
            <li>Erro ao carregar itens</li>
          @endif
        </ul>
        <p class="font-bold text-lg">
          Total:
          R$ {{ number_format(collect($itens)->sum(function ($i) {
      return $i['preco'] * $i['quantidade']; }), 2, ',', '.') }}
        </p>
        <hr class="my-4">
        <p class="text-sm text-gray-500">Data: {{ now()->format('d/m/Y H:i') }}</p>
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
      @foreach ($pedidos as $pedido)
        (function () {
          const pedidoDiv = document.querySelector('div.bg-white.shadow-lg.rounded-xl.p-6.mb-6.border-l-4.border-orange-500:has(h3:contains("Pedido #{{ $pedido->id }}"))');
          if (!pedidoDiv) return;
          const itens = pedidoDiv.querySelectorAll('li');
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
          const totalElement = pedidoDiv.querySelector('#total-{{ $pedido->id }}');
          if (totalElement) {
            totalElement.innerHTML = `<strong>Total:</strong> R$ ${total.toFixed(2).replace('.', ',')}`;
          }
        })();
      @endforeach
    }

    function imprimirComanda(pedidoId) {
      // Esconde todas as comandas de impressão
      document.querySelectorAll('.print-comanda').forEach(el => el.style.display = 'none');
      // Mostra só a comanda do pedido selecionado
      const comanda = document.querySelector(`.print-comanda[data-pedido-id="${pedidoId}"]`);
      if (comanda) {
        comanda.style.display = 'block';
        window.print();
        comanda.style.display = 'none';
      }
    }

    document.addEventListener('DOMContentLoaded', totalPrecoPedido);
  </script>
</body>

</html>