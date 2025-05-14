
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <section class="w-full min-h-screen bg-cover bg-center bg-no-repeat"
    style="background-image: url('../images/bg.jpg')">
    <div class="container mx-auto flex justify-center items-center min-h-screen px-4">
      <div class="bg-white/80 backdrop-blur-lg p-8 rounded-3xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6 font-['Poppins'] text-gray-800">Cadastro</h2>
        <form action="{{ route('cadastro.submit') }}" method="POST" class="space-y-4">
          @csrf
          <div>
            <label class="block text-sm font-semibold mb-2">Nome</label>
            <input type="text" name="nome" required
              class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400"
              placeholder="Seu nome completo">
          </div>
          <div>
            <label class="block text-sm font-semibold mb-2">Email</label>
            <input type="email" name="email" required
              class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400"
              placeholder="seu@email.com">
          </div>
          <div>
            <label class="block text-sm font-semibold mb-2">Telefone (opcional)</label>
            <input type="text" name="telefone"
              class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400"
              placeholder="(11) 99999-9999">
          </div>
          <button type="submit"
            class="w-full bg-yellow-500 hover:bg-white hover:text-yellow-500 border hover:border-yellow-500 text-white font-bold py-3 rounded-xl transition-all">
            Cadastrar
          </button>
        </form>

        <div><!-- Se o usuário já estiver cadastrado, exiba um link para login -->
          <div class="flex items-center justify-center my-4">
            <span class="text-gray-500">Já tem uma conta?</span>
            <a href="{{ route('entrar') }}" class="text-yellow-500 font-semibold ml-2">Entrar</a>
          </div>

        </div>
      </div>
  </section>
</body>

</html>