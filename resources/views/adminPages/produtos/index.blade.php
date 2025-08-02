<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos - Casa dos Salgados</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col items-center justify-start py-10 px-4"
    style="background-image: url('/images/bg.jpg'); background-size: cover;">
    <div class="fixed top-0 left-0 w-full min-h-screen bg-black/40 z-0"></div>

    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 z-10 relative">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center tracking-tight drop-shadow">📦 Lista de
            Produtos</h1>

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
            <form method="GET" action="{{ route('produtos.index') }}"
                class="flex items-center gap-3 w-full md:max-w-md">
                <input type="text" name="busca" placeholder="Buscar produto..." value="{{ request('busca') }}"
                    class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                <button type="submit"
                    class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-4 py-2 rounded-full transition">
                    Buscar
                </button>
                <button type="reset" onclick="window.location.href='{{ route('produtos.index') }}'"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-full transition">
                    Limpar
                </button>
            </form>

            <div class="flex gap-3 w-full md:w-auto justify-end">
                <a href="{{ route('produtos.create') }}"
                    class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-5 py-2 rounded-full transition shadow">
                    + Adicionar Produto
                </a>

                <a href="{{ url('admin') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-5 py-2 rounded-full transition shadow">
                    ← Voltar
                </a>
            </div>
        </div>

        @if (session('success'))
            <p id="success" class="text-green-600 mb-4 font-semibold">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="text-red-600 mb-4 font-semibold">{{ session('error') }}</p>
        @endif

        <div class="overflow-x-auto rounded-xl shadow border border-gray-200">
            <table class="min-w-full table-auto text-sm text-center bg-white">
                <thead class="bg-gray-100 text-gray-700 font-semibold uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 border">ID</th>
                        <th class="px-4 py-3 border">Nome</th>
                        <th class="px-4 py-3 border">Tipo</th>
                        <th class="px-4 py-3 border">Preço</th>
                        <th class="px-4 py-3 border">Imagem</th>
                        <th class="px-4 py-3 border">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produtos as $produto)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border">{{ $produto->id }}</td>
                            <td class="px-4 py-3 border text-left">{{ $produto->nome }}</td>
                            <td class="px-4 py-3 border capitalize">{{ $produto->tipo }}</td>
                            <td class="px-4 py-3 border">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="px-4 py-3 border">
                                @if ($produto->imagem)
                                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                                        class="h-12 w-12 mx-auto object-cover rounded-full shadow">
                                @else
                                    <span class="text-gray-400 italic">Sem imagem</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border">
                                <div class="flex items-center justify-center gap-4">
                                    <a href="{{ route('produtos.edit', $produto->id) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium transition">Editar</a>
                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 font-semibold transition">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 text-gray-400 italic">Nenhum produto encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Oculta a mensagem de sucesso após 4 segundos
        setTimeout(() => {
            const successMessage = document.getElementById('success');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 4000);
    </script>
</body>

</html>