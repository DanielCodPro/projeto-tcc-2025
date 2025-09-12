<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe seu telefone - Casa dos Salgados</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .fade-out {
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .fade-out.hidden {
            opacity: 0;
        }

        span {
            color: #fa5e00;
        }
    </style>

    <link rel="icon" type="image/png" href="{{ asset('images/ícone.png') }}">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center px-4"
        style="background-image: url('../images/bg.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-md space-y-6">

            {{-- Alerta de mensagem --}}
            @if (session('mensagem'))
                <div id="alerta"
                    class="fade-out bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded-md shadow"
                    role="alert">
                    <strong class="font-semibold">Atenção:</strong>
                    <span class="block sm:inline"> {{ session('mensagem') }}</span>
                </div>
                <script>
                    setTimeout(() => {
                        const alerta = document.getElementById('alerta');
                        if (alerta) {
                            alerta.classList.add('hidden');
                        }
                    }, 5000); // some após 5 segundos
                </script>
            @endif

            {{-- Formulário --}}
            <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200 backdrop-blur">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Olá <span>{{ $usuario->nome }}</span>! 👋</h2>
                <form action="{{ route('user.salvarTelefone') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="telefone" class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                        <input type="text" name="telefone" id="telefone"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400 shadow-sm"
                            placeholder="(11) 99999-9999" required>
                    </div>
                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition duration-300">
                        Salvar Telefone
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>