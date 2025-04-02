<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-900 via-black to-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500 text-center w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-orange-500 mb-4">Pedidos</h1>
        
        @foreach ($pedidos as $pedido)
            <div class="bg-gray-700 p-4 rounded-lg mb-4 shadow">
                <p class="text-white font-bold">Nome: {{ $pedido->nome_cliente }} | Mesa: {{ $pedido->mesa }}</p>
                <p class="text-orange-400 mt-2">Itens:</p>
                <ul class="text-white text-left pl-4">
                    @php
                        $itens = json_decode($pedido->itens_pedido, true);
                    @endphp
                    @if (is_array($itens))
                        @foreach ($itens as $item)
                            <li>- {{ $item['nome'] }} - R$ {{ $item['preco'] }}</li>
                        @endforeach
                    @else
                        <li class="text-red-500">Erro ao carregar itens</li>
                    @endif
                </ul>
                <form method="POST" action="/pedidos/{{ $pedido->id }}/status" class="mt-4">
                    @csrf
                    <select name="status" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
                        <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
                        <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
                        <option value="entregue" @selected($pedido->status == 'entregue')>Entregue</option>
                    </select>
                    <button type="submit" class="w-full mt-2 bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold">Atualizar</button>
                </form>
            </div>
        @endforeach
        
        <button onclick="window.location.href='{{ url('admin') }}'" class="w-full bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold">Voltar</button>
    </div>
</body>
</html>
