<!-- resources/views/adminPages/produtos/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white min-h-screen flex flex-col items-center justify-start py-10 px-4">
    <div class="w-full max-w-5xl bg-white rounded-xl shadow-xl p-8 border border-gray-200">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">📦 Lista de Produtos</h1>

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('produtos.create') }}"
                class="bg-orange-400 hover:bg-orange-500 text-black font-semibold py-2 px-4 rounded transition">
                ➕ Adicionar Produto
            </a>

            <a href="{{ url('admin') }}"
                class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded transition">
                ⬅ Voltar
            </a>
        </div>

        @if (session('success'))
            <p id="success" class="text-green-600 mb-4 font-semibold">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="text-red-600 mb-4 font-semibold">{{ session('error') }}</p>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-800 font-bold">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nome</th>
                        <th class="border px-4 py-2">Preço</th>
                        <th class="border px-4 py-2">Quantidade</th>
                        <th class="border px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-center">{{ $produto->id }}</td>
                            <td class="border px-4 py-2">{{ $produto->nome }}</td>
                            <td class="border px-4 py-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="border px-4 py-2 text-center">{{ $produto->quantidade }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('produtos.edit', $produto->id) }}"
                                    class="text-blue-600 hover:underline mr-3">Editar</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:underline font-semibold">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Oculta a mensagem de sucesso após 4 segundos
        setTimeout(function () {
            const successMessage = document.getElementById('success');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 4000);
    </script>
</body>

</html>
