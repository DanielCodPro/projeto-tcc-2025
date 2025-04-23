<!--resources/views/adminPages/produtos/edit.blade.php-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ $produto->nome }}" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao">{{ $produto->descricao }}</textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" value="{{ $produto->preco }}" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" value="{{ $produto->quantidade }}" required><br><br>

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('produtos.index') }}">Voltar para a lista de produtos</a> 

</body>
</html>