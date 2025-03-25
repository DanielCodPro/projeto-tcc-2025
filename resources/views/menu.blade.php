<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
</head>
<body>
<h1>Menu</h1>
<ul>
    <li>Hambúrguer - R$ 20 <button onclick="adicionarAoCarrinho('Hambúrguer', 20)">Adicionar</button></li>
    <li>Pizza - R$ 30 <button onclick="adicionarAoCarrinho('Pizza', 30)">Adicionar</button></li>
    <li>Refrigerante - R$ 10 <button onclick="adicionarAoCarrinho('Refrigerante', 10)">Adicionar</button></li>
    <li>Salada - R$ 15 <button onclick="adicionarAoCarrinho('Salada', 15)">Adicionar</button></li>
</ul>
<a href="/checkout">Finalizar Pedido</a>

<script>
    function adicionarAoCarrinho(nome, preco) {
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        carrinho.push({ nome, preco });
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
    }
</script>
</body>
</html>