<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Painel Admin - Casa dos Salgados</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    const senhaCorreta = '1234';

    function validarSenha() {
      const senha = document.getElementById('senha').value;
      if (senha === senhaCorreta) {
        sessionStorage.setItem('admin_autenticado', 'true');
        mostrarConteudo();
      } else {
        alert('Senha incorreta!');
      }
    }

    function mostrarConteudo() {
      document.getElementById('conteudo').style.display = 'block';
      document.getElementById('form-senha').style.display = 'none';
    }

    window.onload = function () {
      if (sessionStorage.getItem('admin_autenticado') === 'true') {
        mostrarConteudo();
      }
    }
  </script>
  <link rel="icon" type="image/png" href="{{ asset('images/ícone.png') }}">
</head>

<body class="bg-cover bg-center flex items-center justify-center min-h-screen relative font-sans"
  style="background-image: url('/images/bg.jpg');">
  <div class="fixed inset-0 bg-black bg-opacity-20 z-0"></div>


  <div class="relative z-10 w-full max-w-md p-6 bg-white/95 rounded-2xl shadow-lg border border-orange-400">
    <h1 class="text-3xl font-bold text-center text-orange-500 mb-6">Painel Administrativo</h1>
    <div class="relative z-10 w-full max-w-md px-6">
      <div class="text-center mb-10">
        <img src="/images/logo.png" alt="Logo"
          class="mx-auto w-24 h-24 rounded-full border-4 border-gray-300 shadow-lg bg-white object-cover mb-3">
        <h1 class="text-3xl font-bold text-gray-800">Bem-vindo <span class="text-orange-500">Admin</span></h1>
      </div>

      <!-- Formulário de senha -->
      <div id="form-senha" class="bg-white/95 p-8 rounded-2xl shadow-xl border border-orange-400">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Insira a senha para acessar:</h2>
        <input type="password" id="senha" placeholder="Digite a senha"
          class="w-full p-3 rounded-md bg-gray-100 text-gray-800 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition" />
        <button onclick="validarSenha()"
          class="w-full mt-5 bg-orange-500 text-white py-3 rounded-md font-semibold hover:bg-orange-600 transition-all duration-300 shadow-md">
          Entrar
        </button>
      </div>

      <!-- Conteúdo protegido -->
      <div id="conteudo" style="display: none;"
        class="bg-white/95 mt-10 p-8 rounded-2xl shadow-xl border border-orange-400">
        <h2 class="text-2xl font-bold text-orange-500 mb-6 text-center">- Funções -</h2>
        <div class="flex flex-col gap-4">
          <button onclick="window.location.href='{{ route('admin.pedidosLocais') }}'"
            class="w-full bg-orange-500 text-white py-3 rounded-md font-semibold hover:bg-orange-600 transition-all duration-300 shadow-sm">
            Ver Pedidos Locais
          </button>
          <button onclick="window.location.href='{{ route('admin.pedidosDelivery') }}'"
            class="w-full bg-orange-500 text-white py-3 rounded-md font-semibold hover:bg-orange-600 transition-all duration-300 shadow-sm">
            Ver Pedidos Delivery
          </button>
          <button onclick="window.location.href='{{ route('produtos.index') }}'"
            class="w-full bg-orange-500 text-white py-3 rounded-md font-semibold hover:bg-orange-600 transition-all duration-300 shadow-sm">
            Gerenciar Produtos
          </button>
        </div>
      </div>
    </div>
</body>

</html>