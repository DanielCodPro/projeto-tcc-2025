<!-- resources/views/adminPages/produtos/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-10" style="background-image: url('/images/bg.jpg');">
    <div class="absolute inset-0 bg-black/40 z-0"></div>
    <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-xl border border-gray-200 z-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">➕ Adicionar Produto</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="nome" class="block text-gray-700 font-semibold">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div>
                <label for="descricao" class="block text-gray-700 font-semibold">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="3"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">{{ old('descricao') }}</textarea>
            </div>

            <div>
                <label for="preco" class="block text-gray-700 font-semibold">Preço:</label>
                <input type="number" step="0.01" min="0.01" name="preco" id="preco" value="{{ old('preco') }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div>
                <label for="quantidade" class="block text-gray-700 font-semibold">Quantidade:</label>
                <input type="number" min="1" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div>
                <label for="tipo" class="block text-gray-700 font-semibold">Tipo:</label>
                <select name="tipo" id="tipo" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <option value="">Selecione...</option>
                    <option value="alimento" {{ old('tipo') == 'alimento' ? 'selected' : '' }}>Alimento</option>
                    <option value="bebida" {{ old('tipo') == 'bebida' ? 'selected' : '' }}>Bebida</option>
                </select>
            </div>

            <div>
                <label for="imagem" class="block text-gray-700 font-semibold">Imagem do Produto:</label>
                <input type="file" name="imagem" id="imagem" accept="image/*"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('produtos.index') }}" class="text-sm text-gray-600 hover:underline">← Voltar para a
                    lista</a>
                <button type="submit"
                    class="bg-orange-400 hover:bg-orange-500 text-black font-semibold py-2 px-6 rounded-lg transition">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</body>

</html>