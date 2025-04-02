<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-900 via-black to-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-96 border border-orange-500">
        <h1 class="text-2xl font-bold text-center mb-4 text-orange-500">Menu</h1>
        <ul class="space-y-4">
            <li class="flex justify-between items-center bg-gray-700 p-3 rounded-lg">
                <span class="text-white">Hambúrguer - R$ 20</span>
                <button class="bg-orange-500 text-black px-3 py-1 rounded-lg hover:bg-orange-600" onclick="adicionarAoCarrinho('Hambúrguer', 20)">Adicionar</button>
            </li>
            <li class="flex justify-between items-center bg-gray-700 p-3 rounded-lg">
                <span class="text-white">Pizza - R$ 30</span>
                <button class="bg-orange-500 text-black px-3 py-1 rounded-lg hover:bg-orange-600" onclick="adicionarAoCarrinho('Pizza', 30)">Adicionar</button>
            </li>
            <li class="flex justify-between items-center bg-gray-700 p-3 rounded-lg">
                <span class="text-white">Refrigerante - R$ 10</span>
                <button class="bg-orange-500 text-black px-3 py-1 rounded-lg hover:bg-orange-600" onclick="adicionarAoCarrinho('Refrigerante', 10)">Adicionar</button>
            </li>
            <li class="flex justify-between items-center bg-gray-700 p-3 rounded-lg">
                <span class="text-white">Salada - R$ 15</span>
                <button class="bg-orange-500 text-black px-3 py-1 rounded-lg hover:bg-orange-600" onclick="adicionarAoCarrinho('Salada', 15)">Adicionar</button>
            </li>
            <li class="flex justify-between items-center bg-gray-700 p-3 rounded-lg">
                <span class="text-white">Paçoca - R$ 8</span>
                <button class="bg-orange-500 text-black px-3 py-1 rounded-lg hover:bg-orange-600" onclick="adicionarAoCarrinho('Paçoca', 8)">Adicionar</button>
            </li>
        </ul>
        <a href="/checkout" class="block text-center bg-orange-600 text-black mt-4 p-2 rounded-lg hover:bg-orange-700">Finalizar Pedido</a>
    </div>

    <script>
        function adicionarAoCarrinho(nome, preco) {
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            carrinho.push({ nome, preco });
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
        }
    </script>
</body>
</html>

<!--
    Este código é um exemplo de um menu de restaurante simples utilizando HTML, CSS (Tailwind CSS) e JavaScript.
    O menu contém uma lista de itens com seus respectivos preços e um botão "Adicionar" para cada item.
    Ao clicar no botão, o item é adicionado ao carrinho, que é armazenado no localStorage do navegador.
    Há também um botão "Finalizar Pedido" que redireciona para a página de checkout.