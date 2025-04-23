<!-- resources/views/adminPages/produtos/create.blade.php-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produtos</title>
</head>
<body>
    <h1>Adicionar Produto</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       

        <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <label>Nome:</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" id="descricao" value="{{ old('descricao') }}"></textarea><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" id="preco" step="0.01" min="0.01" value="{{ old('preco') }}" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" min="1" value="{{  old('quantidade') }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('produtos.index') }}">Voltar para a lista de produtos</a>

</body>
</html>