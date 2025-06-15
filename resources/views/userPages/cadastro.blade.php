{{-- condições de erro --}}

@if(session('mensagem'))
  <div class="alert bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
    <strong class="font-bold">Atenção!</strong>
    <span class="block sm:inline"> {{ session('mensagem') }}</span>
  </div>
@endif

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro - Casa dos Salgados</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    img {
      max-width: 100%;
      height: auto;
      width: 80px;
      border: 2px solid white;
      border-radius: 50%;
      margin-right: 10px;
    }
  </style>
</head>

<body class="grid md:grid-cols-2 min-h-screen bg-gray-100">

  <!-- Lado Esquerdo -->
  <div class="text-white flex flex-col justify-between items-center h-full p-10"
    style="background: linear-gradient(90deg,rgba(253, 81, 29, 1) 9%, rgba(252, 176, 69, 1) 100%);">

    <!-- Topo -->
    <div class="flex flex-col items-center space-y-4 mt-8 mb-6">
      <img src="../images/logo.png" alt="Logo Casa dos Salgados" class="w-24 h-24 object-contain shadow-lg" />
      <h1 class="text-5xl font-extrabold uppercase tracking-widest text-center text-white drop-shadow-lg">Casa dos
        Salgados</h1>
    </div>

    <!-- Centro -->
    <div
      class="flex flex-col items-center justify-center max-w-md mx-auto text-center bg-white bg-opacity-20 rounded-xl shadow-lg p-8 backdrop-blur-sm">
      <p class="text-2xl italic font-semibold text-white drop-shadow mb-4">
        “Ninguém nasce um ótimo cozinheiro. Se aprende fazendo.” Dona Osmara
      </p>
      <hr class="border-t-4 border-yellow-400 w-16 mx-auto mb-4 opacity-70">
      <p class="text-lg text-black font-medium drop-shadow">
        Venha fazer parte da nossa família!<br>
        <span class="text-yellow-300">Cadastre-se</span> e descubra o sabor dos melhores salgados de <span
          class="font-bold text-yellow-300">Mogi Mirim</span>.
      </p>
    </div>

    <!-- Base -->
    <div class="flex flex-col items-center space-y-4">
      <div class="flex items-center space-x-2 pt-4">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M20.487 17.14l-4.207-1.058a1.003 1.003 0 00-1.003.291l-2.356 2.866a15.055 15.055 0 01-7.14-7.14l2.866-2.356a1.003 1.003 0 00.291-1.003L6.86 3.513A1.002 1.002 0 005.887 3H3.005A1.002 1.002 0 002 4.005c0 10.493 8.502 18.995 18.995 18.995A1.002 1.002 0 0022 21v-2.882a1.002 1.002 0 00-.633-.978z">
          </path>
        </svg>
        <span class="text-base font-medium">99635-9428</span>
      </div>
      <p class="text-sm text-white opacity-80 text-center">
        © 2025 Casa dos Salgados. Todos os direitos reservados.
      </p>
    </div>

  </div>


  <!-- Lado Direito -->
  <div class="p-6 sm:p-10 flex flex-col justify-center bg-cover bg-center"
    style="background-image: url('../images/bg.jpg');">
    <div
      class="max-w-lg w-full mx-auto bg-white bg-opacity-90 backdrop-blur-sm p-10 rounded-2xl shadow-2xl border border-gray-200">
      <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Crie sua conta</h2>
      <form action="{{ route('cadastro.submit') }}" method="POST" class="space-y-5">
        @csrf
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
          <input type="text" name="nome" required
            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm"
            placeholder="Seu nome completo">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" name="email" required
            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm"
            placeholder="seu@email.com">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Telefone (opcional)</label>
          <input type="text" name="telefone"
            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm"
            placeholder="(11) 99999-9999">
        </div>
        <button type="submit"
          class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
          Cadastrar
        </button>
      </form>
      <div class="flex items-center justify-center mt-6 text-sm">
        <span class="text-gray-600">Já tem uma conta?</span>
        <a href="{{ route('entrar') }}" class="text-yellow-600 font-semibold ml-2 hover:underline">Entrar</a>
      </div>
    </div>
  </div>

  <script>
    //Se mensagem de erro existir, é removida após 5 segundos
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) {
        alert.remove();
      }
    }, 5000);
  </script>

</body>


</html>