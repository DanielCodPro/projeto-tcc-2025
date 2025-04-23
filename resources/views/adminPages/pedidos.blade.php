<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
<h1>Pedidos</h1>
@foreach ($pedidos as $pedido)
    <p>Nome: {{ $pedido->nome_cliente }} | Mesa: {{ $pedido->mesa }}</p>
    <p>Itens:</p>
<ul>
    @php
        $itens = json_decode($pedido->itens_pedido, true);
    @endphp

    @if (is_array($itens))
        @foreach ($itens as $item)
            <li>{{ $item['nome'] }} - R$ {{ $item['preco'] }}</li>
        @endforeach
    @else
        <li>Erro ao carregar itens</li>
    @endif
</ul>

</p>
    <form method="POST" action="/pedidos/{{ $pedido->id }}/status">
        @csrf
        <select name="status">
            <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
            <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
            <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
            <option value="entregue" @selected($pedido->status == 'entregue')>Entregue</option>
        </select>
        <button type="submit">Atualizar</button>
    </form>
@endforeach
<button onclick="window.location.href='{{ url('admin') }}'">Voltar</button>
</body>
</html>

<!--Nesta página o funcionário consegue gerenciar os pedidos dos clientes-->


