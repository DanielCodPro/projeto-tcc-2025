<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Locais</title>
</head>

<body
  class="bg-cover bg-center flex items-center justify-center min-h-screen"
  style="background-image: url('bg.jpg');"
>
  <div
    class="bg-white p-8 rounded-xl shadow-2xl border-2 border-orange-300 text-center w-full max-w-2xl"
  >
    <h1 class="text-3xl font-extrabold text-orange-400 mb-6">Pedidos</h1>

    @foreach ($pedidos as $pedido)
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
            <h3>ID do Pedido - #{{ $pedido->id }}</h3>
            <p><strong>Cliente:</strong> {{ $pedido->nome_cliente }}</p>
            <p><strong>Mesa:</strong> {{ $pedido->mesa }}</p>

            <p><strong>Itens:</strong></p>
            <ul>
                @php
                    $itens = json_decode($pedido->itens_pedido, true);
                @endphp

                @if (is_array($itens))
                    @foreach ($itens as $item)
                        <li>{{ $item['nome'] }} - R$ {{ number_format($item['preco'], 2, ',', '.') }} - Quantidade({{ $item['quantidade'] }})</li>
                    @endforeach
                @else
                    <li>Erro ao carregar itens</li>
                @endif
            </ul>
            <p id="total">Total:R$ 0,00</p>

        <form method="POST" action="/pedidos/{{ $pedido->id }}/status">
          @csrf
          <select
            name="status"
            class="w-full p-3 rounded-lg bg-white text-black border-2 border-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-300 mb-3"
          >
            <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
            <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
            <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
            <option value="entregue" @selected($pedido->status == 'entregue')>Entregue</option>
          </select>
          <button
            type="submit"
            class="w-full bg-orange-300 text-black p-3 rounded-lg hover:bg-orange-400 font-semibold transition duration-300"
          >
            Atualizar
          </button>
        </form>
      </div>
    @endforeach

    <button
      onclick="window.location.href='{{ url('admin') }}'"
      class="w-full bg-orange-300 text-black p-3 rounded-lg hover:bg-orange-400 font-semibold transition duration-300"
    >
      Voltar
    </button>
  </div>
</body>

<script>
    function totalPrecoPedido() {
        const pedidos = document.querySelectorAll('div');
        pedidos.forEach(pedido => {
            const itens = pedido.querySelectorAll('li');
            let total = 0;
            itens.forEach(item => {
                const preco = parseFloat(item.textContent.match(/R\$ ([\d,]+)/)[1].replace(',', '.'));
                const quantidade = parseInt(item.textContent.match(/Quantidade\((\d+)\)/)[1]);
                total += preco * quantidade;
            });
            pedido.querySelector('#total').innerHTML = `<strong>Total:</strong> R$ ${total.toFixed(2).replace('.', ',')}`;
        });
    }
    document.addEventListener('DOMContentLoaded', totalPrecoPedido);    
</script>

</html>
