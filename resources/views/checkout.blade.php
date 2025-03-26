<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
</head>
<body>
<h1>Finalizar Pedido</h1>
<form method="POST" action="/pedido">
    @csrf
    <label>Nome:</label> <input type="text" name="nome" required>
    <label>Email:</label> <input type="email" name="email">
    <label>Mesa:</label> <input type="text" name="mesa" required>
    <input type="hidden" name="itens" id="itens_pedido">
    <button type="submit" onclick="window.location.href='{{ url('pagamento') }}'">Enviar Pedido</button>
</form>



<script>
    let carrinho = localStorage.getItem('carrinho');

if (carrinho) {
    try {
        let itens = JSON.parse(carrinho); // Converte para objeto
        document.getElementById('itens_pedido').value = JSON.stringify(itens); // Converte de volta para JSON limpo
    } catch (error) {
        console.error("Erro ao processar carrinho:", error);
        document.getElementById('itens_pedido').value = "[]"; // Evita erros
    }
}
localStorage.removeItem('carrinho');
</script>

</body>
</html>

