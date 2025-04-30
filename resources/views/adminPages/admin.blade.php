<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function validarSenha() {
            const senha = document.getElementById('senha').value;
            const senhaCorreta = 'kauangostoso'; 
            if (senha === senhaCorreta) {
                document.getElementById('conteudo').style.display = 'block';
                document.getElementById('form-senha').style.display = 'none';
            } else {
                alert('Senha incorreta!');
            }
        }
    </script>
</head>
<body class="bg-gradient-to-r from-gray-900 via-black to-gray-900 flex items-center justify-center min-h-screen">
    <div id="form-senha" class="bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500 text-center w-96">
        <h1 class="text-2xl font-bold text-orange-500">Bem-vindo</h1>
        <p class="text-white mb-4">Insira a senha para acessar a página:</p>
        <input type="password" id="senha" placeholder="Digite a senha" class="w-full p-2 rounded-lg bg-gray-700 text-white border border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500">
        <button onclick="validarSenha()" class="w-full mt-4 bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold">Entrar</button>
    </div>


    <div id="conteudo" class="hidden bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500 text-center w-96">
        <h1 class="text-2xl font-bold text-orange-500 mb-4">Página do Funcionário</h1>
        <button onclick="window.location.href='{{ url('pedidos') }}'" class="w-full bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold mb-2">Ir para Pedidos</button>
        <button onclick="window.location.href='{{ url('outra-pagina') }}'" class="w-full bg-orange-600 text-black p-2 rounded-lg hover:bg-orange-700 font-bold">Outra Página</button>

    </div>
</body>
</html>
<!--
    Este código é um exemplo de uma página de login para funcionários de um restaurante.
    O usuário deve inserir uma senha para acessar o conteúdo restrito.
    Se a senha estiver correta, o conteúdo é exibido.
    Caso contrário, um alerta informa que a senha está incorreta.