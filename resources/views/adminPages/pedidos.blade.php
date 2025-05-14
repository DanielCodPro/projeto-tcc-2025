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
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
            <h3>Pedido #{{ $pedido->id }}</h3>
            <p><strong>Cliente:</strong> {{ $pedido->nome_cliente }}</p>
            <p><strong>Mesa:</strong> {{ $pedido->mesa }}</p>
            <p><strong>Status:</strong> {{ ucfirst($pedido->status) }}</p>

            <p><strong>Itens:</strong></p>
            <ul>
                @php
                    $itens = json_decode($pedido->itens_pedido, true);
                @endphp

                @if (is_array($itens))
                    @foreach ($itens as $item)
                        <li>{{ $item['nome'] }} - R$ {{ number_format($item['preco'], 2, ',', '.') }}</li>
                    @endforeach
                @else
                    <li>Erro ao carregar itens</li>
                @endif
            </ul>

            <form method="POST" action="/pedidos/{{ $pedido->id }}/status">
                @csrf
                <label>Status:</label>
                <select name="status">
                    <option value="pendente" @selected($pedido->status == 'pendente')>Pendente</option>
                    <option value="em preparo" @selected($pedido->status == 'em preparo')>Em Preparo</option>
                    <option value="pronto" @selected($pedido->status == 'pronto')>Pronto</option>
                    <option value="entregue" @selected($pedido->status == 'entregue')>Entregue (Excluir)</option>
                </select>
                <button type="submit">Atualizar</button>
            </form>
        </div>
    @endforeach
    <button onclick="window.location.href='{{ url('admin') }}'"
        style="margin-top: 20px; padding: 10px 20px;">Voltar</button>
</body>

</html>

<!--Nesta página o funcionário consegue gerenciar os pedidos dos clientes-->