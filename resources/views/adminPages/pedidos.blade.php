<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pedidos</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
      <div
        class="bg-white border-2 border-orange-300 rounded-lg p-5 mb-6 shadow text-black text-left"
      >
        <p class="font-bold mb-2">
          Nome: {{ $pedido->nome_cliente }} | Mesa: {{ $pedido->mesa }}
        </p>
        <p class="text-orange-400 font-semibold mb-1">Itens:</p>
        <ul class="pl-5 list-disc mb-4">
          @php
            $itens = json_decode($pedido->itens_pedido, true);
          @endphp
          @if (is_array($itens))
            @foreach ($itens as $item)
              <li>
                {{ $item['nome'] }} - R$ {{ number_format($item['preco'], 2, ',', '.') }}
              </li>
            @endforeach
          @else
            <li class="text-red-500">Erro ao carregar itens</li>
          @endif
        </ul>

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

</html>
