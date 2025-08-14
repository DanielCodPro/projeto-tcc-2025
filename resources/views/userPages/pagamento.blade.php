<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Casa dos Salgados</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-pattern {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="font-poppins min-h-screen bg-pattern flex items-center justify-center p-4 relative">

    <a href="{{ url()->previous() }}" 
   class="absolute top-6 left-6 bg-orange-500 hover:bg-orange-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center transition transform hover:-translate-x-1">
    
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
</a>

    
    <div class="bg-white/95 rounded-xl shadow-2xl max-w-md w-full border border-orange-200">
        
        
        <div class="bg-orange-500 text-white text-center py-3 rounded-t-xl font-bold text-lg">
            Detalhes do cartão
        </div>

        
        <form action="{{ route('sucesso.pagamento') }}" method="GET" class="p-6 space-y-5">
            @csrf

            
            <div class="border border-dashed border-orange-300 rounded-lg p-3">
                <label class="block font-semibold text-gray-700 mb-2">Método de Pagamento:</label>
                <div class="flex items-center gap-3">
                    <img src="/images/mc.png" class="h-8" alt="MasterCard">
                    <img src="/images/visa.png" class="h-5" alt="Visa">
                    <img src="/images/amex.png" class="h-10" alt="Amex">
                    <img src="/images/elo.png" class="h-12" alt="Elo">
                </div>
            </div>

            
            <div>
                <label for="nome" class="block font-semibold text-gray-700 mb-1">Nome no cartão</label>
                <input type="text" id="nome" name="nome" placeholder="João da Silva"
                    class="w-full border border-orange-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            
            <div>
                <label for="numero" class="block font-semibold text-gray-700 mb-1">Número do cartão</label>
                <input type="text" id="numero" name="numero" placeholder="0000 0000 0000 0000"
                    class="w-full border border-orange-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            
            <div class="flex gap-3">
                <div class="flex-1">
                    <label for="mes" class="block font-semibold text-gray-700 mb-1">Mês</label>
                    <select id="mes" name="mes"
                        class="w-full border border-orange-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="">Mês</option>
                        @for($i=1; $i<=12; $i++)
                            <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex-1">
                    <label for="ano" class="block font-semibold text-gray-700 mb-1">Ano</label>
                    <select id="ano" name="ano"
                        class="w-full border border-orange-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="">Ano</option>
                        @for($i=date('Y'); $i<=date('Y')+10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            
            <div>
                <label for="cvv" class="block font-semibold text-gray-700 mb-1">Código de segurança</label>
                <input type="text" id="cvv" name="cvv" placeholder="Código"
                    class="w-full border border-orange-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            
            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition">
                Processar Pagamento
            </button>
        </form>
    </div>

    
    <script src="https://kit.fontawesome.com/a2d5f8eafd.js" crossorigin="anonymous"></script>
</body>
</html>
