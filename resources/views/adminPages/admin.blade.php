<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
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
</head>

<body class="bg-cover bg-center flex items-center justify-center min-h-screen" style="background-image: url('bg.jpg');">
  <!-- Formulário de senha -->
  <div id="form-senha" class="bg-white p-6 rounded-xl shadow-2xl border border-orange-300 text-center w-96">
    <h1 class="text-3xl font-bold text-orange-400 mb-2">Bem-vindo</h1>
    <p class="text-gray-700 mb-4">Insira a senha para acessar a página:</p>
    <input type="password" id="senha" placeholder="Digite a senha"
      class="w-full p-2 rounded-lg bg-gray-100 text-black border border-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-200" />
    <button onclick="validarSenha()"
      class="w-full mt-4 bg-orange-300 text-black p-2 rounded-lg hover:bg-orange-400 font-semibold transition-all duration-300">
      Entrar
    </button>
  </div>

    <div id="conteudo" style="display: none;">
        <h1>Página do Funcionário</h1>
        <button onclick="window.location.href='{{ route('admin.pedidosLocais') }}'">Ir para Pedidos</button>
        <button onclick="window.location.href='{{ route('admin.pedidosDelivery') }}'">Ir para Pedidos Delivery</button>
        <button onclick="window.location.href='{{ route('produtos.index') }}'">Ir para Produtos</button>
    </div>
</body>

</html>
