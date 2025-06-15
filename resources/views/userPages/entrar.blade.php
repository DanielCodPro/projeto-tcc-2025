{{-- Mensagem de sucesso --}}
@if(session('sucesso'))
  <div class="alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
    <strong class="font-bold">Bem-vindo de volta!</strong>
    <span class="block sm:inline">{{ session('sucesso') }}</span>
  </div>
@endif

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Casa dos Salgados</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    img.logo {
      max-width: 100%;
      height: auto;
      width: 80px;
      border: 2px solid white;
      border-radius: 50%;
      margin-right: 10px;
    }

    .text-orange-500 {
      color: #fd511d;
    }
    .text-orange-300 {
      color: #f97316;
    }
    .border-orange-500 {
      border-color: #fd511d;
    }

  </style>
</head>

<body class="grid md:grid-cols-2 min-h-screen bg-gray-100">

  <!-- Lado esquerdo (Institucional) -->
  <div class="text-white flex flex-col justify-between items-center h-full p-10 relative bg-cover bg-center"
    style="background-image: url('../images/bg.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-0"></div>
    <!-- Logo e Título -->
    <div class="flex flex-col items-center space-y-4 mt-8 mb-6 z-10">
      <img src="../images/logo.png" alt="Logo Casa dos Salgados" class="logo shadow-lg" />
      <h1 class="text-5xl font-extrabold uppercase tracking-widest text-center drop-shadow-lg text-orange-300">Casa dos
        Salgados</h1>
    </div>
    <!-- Frase e descrição -->
    <div
      class="flex flex-col items-center justify-center max-w-md mx-auto text-center z-10 bg-black bg-opacity-40 rounded-xl shadow-lg p-8 backdrop-blur-md">
      <p class="text-2xl italic font-semibold text-white drop-shadow mb-4">“O segredo está no tempero e no carinho.”</p>
      <hr class="border-t-4 border-orange-500 w-16 mx-auto mb-4 opacity-80">
      <p class="text-lg text-white font-medium drop-shadow">
        Já é da casa? <span class="font-bold text-orange-500">Entre</span> e aproveite nossas delícias de
        <span class="font-bold text-orange-500">Mogi Mirim</span>.
      </p>
    </div>
    <!-- Contato e direitos -->
    <div class="flex flex-col items-center space-y-4 z-10 mt-8">
      <div class="flex items-center space-x-2">
        <svg class="w-5 h-5 text-orange-300" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M20.487 17.14l-4.207-1.058a1.003 1.003 0 00-1.003.291l-2.356 2.866a15.055 15.055 0 01-7.14-7.14l2.866-2.356a1.003 1.003 0 00.291-1.003L6.86 3.513A1.002 1.002 0 005.887 3H3.005A1.002 1.002 0 002 4.005c0 10.493 8.502 18.995 18.995 18.995A1.002 1.002 0 0022 21v-2.882a1.002 1.002 0 00-.633-.978z">
          </path>
        </svg>
        <span class="text-orange-300 font-semibold drop-shadow">99635-9428</span>
      </div>
      <p class="text-sm text-orange-300 text-center font-semibold">© 2025 Casa dos Salgados. Todos os direitos
        reservados.</p>
    </div>
  </div>

  <!-- Lado direito (Formulário de Login) -->
  <div class="p-6 sm:p-10 flex flex-col justify-center bg-gray-100 text-gray-800 relative overflow-hidden"
  style="background: linear-gradient(135deg,rgb(254, 252, 252) 70%, #f97316 100%);">
    <div class="max-w-lg w-full mx-auto bg-[#fd511d] text-gray-800 p-10 rounded-2xl shadow-2xl border border-gray-200">
      <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Faça seu Login</h2>
      <form action="{{ route('entrar.submit') }}" method="POST" class="space-y-5">
        @csrf
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
          <input type="text" name="nome" required
            class="w-full p-3 rounded-lg border border-gray-300 bg-transparent focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm placeholder-gray-400"
            placeholder="Seu nome completo">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" name="email" required
            class="w-full p-3 rounded-lg border border-gray-300 bg-transparent focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm placeholder-gray-400"
            placeholder="seu@email.com">
        </div>
        <button type="submit"
          class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
          Entrar
        </button>
      </form>

      <div class="flex items-center justify-center my-4 text-sm text-gray-600">
        <span>ou entre com</span>
      </div>

      <a href="/auth/google"
        class="flex items-center justify-center bg-green-500 hover:bg-white hover:text-green-500 border hover:border-green-500 text-white font-bold py-3 rounded-lg transition duration-300 w-full">
        <img
          src="https://i0.wp.com/res.cloudinary.com/ratracegrad/image/upload/v1672512497/Screenshot_2022-12-31_at_1.48.07_PM_zmev88.png?ssl=1"
          alt="Google" class="w-6 h-6 mr-2 rounded-full">
        Entrar com Google
      </a>

      <div class="flex justify-center mt-6 text-sm text-gray-600">
        <span>Não tem uma conta?</span>
        <a href="{{ route('cadastro') }}" class="text-yellow-500 font-semibold ml-2 hover:underline">Cadastre-se</a>
      </div>
    </div>
  </div>

  <script>
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) alert.remove();
    }, 5000);
  </script>
</body>

</html>