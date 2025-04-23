<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
<body>
    <div id="form-senha">
        <h1>Bem-vindo</h1>
        <p>Insira a senha para acessar a página:</p>
        <input type="password" id="senha" placeholder="Digite a senha">
        <button onclick="validarSenha()">Entrar</button>
    </div>

    <div id="conteudo" style="display: none;">
        <h1>Página do Funcionário</h1>
        <button onclick="window.location.href='{{ route('admin.pedidos') }}'">Ir para Pedidos</button>
        <button onclick="window.location.href='{{ route('produtos.index') }}'">Ir para Produtos</button>
    </div>
</body>
</html>