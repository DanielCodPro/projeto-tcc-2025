<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
<body>
    <div id="form-senha">
        <h1>Bem-vindo</h1>
        <p>Insira a senha para acessar a página:</p>
        <input type="password" id="senha" placeholder="Digite a senha">
        <button onclick="validarSenha()">Entrar</button>
    </div>

    <div id="conteudo" style="display: none;">
        <h1>Página do Funcionário</h1>
        <button onclick="window.location.href='{{ route('admin.pedidosLocais') }}'">Ir para Pedidos</button>
        <button onclick="window.location.href='{{ route('admin.pedidosDelivery') }}'">Ir para Pedidos Delivery</button>
        <button onclick="window.location.href='{{ route('produtos.index') }}'">Ir para Produtos</button>
    </div>
</body>
</html>
