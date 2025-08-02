<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saiba Mais - Casa dos Salgados</title>
    <!-- Meta tags e SEO mantidos -->
    <meta name="description"
        content="Deliciosos salgados feitos com carinho! Venha conhecer a Casa dos Salgados, destaque em Mogi Mirim. Drive-thru e atendimento especial!">
    <meta name="keywords" content="salgados, salgadaria, Mogi Mirim, comida rápida, festa, delivery, drive-thru">
    <meta name="author" content="Casa dos Salgados">
    <meta name="language" content="pt-BR">
    <meta property="og:title" content="Casa dos Salgados - Os Melhores Salgados de Mogi Mirim">
    <meta property="og:description"
        content="Experimente nossos salgados irresistíveis. Atendimento de qualidade e drive-thru.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="https://www.casadossalgados.com.br">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Casa dos Salgados">
    <meta name="twitter:description" content="A melhor salgadaria da região de Mogi Mirim!">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-gray-800 font-sans"
    style="background-image: url('/images/bg.jpg'); background-size: cover; background-position: center;">
    <!-- botão voltar para página inicial -->
    <a href="{{ route('user.index') }}"
        class="fixed top-4 left-4 bg-orange-500 text-white p-3 rounded-full shadow-lg hover:bg-orange-600 transition">
        <i class="fa fa-home"></i>
    </a>

    <!-- Sobre Nós -->
    <section class="max-w-5xl mx-auto py-12 px-4">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-bold text-orange-500 underline underline-offset-8 mb-4">Sobre Nós</h2>
                <p class="text-lg text-gray-700 mb-4">
                    A Casa dos Salgados é uma empresa familiar que começou com a paixão por salgados. Oferecemos
                    diversos salgados excepcionais e uma experiência única para todos os clientes! Você vai amar!
                </p>
            </div>
            <div class="flex justify-center">
                <!-- Substitua pelo logo ou imagem do local -->
                <img src="images/logo.png" alt="Casa dos Salgados"
                    class="w-56 h-56 object-contain rounded-xl shadow-lg bg-white border border-gray-200 p-4">
            </div>
        </div>
    </section>

    <!-- Salgados Fritos -->
    <section class="max-w-5xl mx-auto py-8 px-4">
        <h3 class="text-2xl font-semibold text-orange-500 underline underline-offset-8 mb-6">Salgados Fritos</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/coxinha.jpg" alt="Coxinha" class="w-40 h-40 mb-3 object-contain rounded-xl">
                <p class="font-medium text-gray-800">Coxinha</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/bolinha-de-queijo.jpg" alt="Bolinha de Queijo"
                    class="w-40 h-40 mb-3  rounded-xl">
                <p class="font-medium text-gray-800">Bolinha de Queijo</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/presunto.jpg" alt="Presunto" class="w-40 h-40 mb-3 object-contain rounded-xl">
                <p class="font-medium text-gray-800">Presunto</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/alho.jpg" alt="Queijo com Alho" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Queijo com Alho</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/milho.jpg" alt="Milho com Catupiry" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Milho com Catupiry</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/calabresa.png" alt="Calabresa" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Calabresa</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/salsicha.jpg" alt="Salsicha" class="w-40 h-40 mb-3 object-contain rounded-xl">
                <p class="font-medium text-gray-800">Salsicha</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/croquete.jpg" alt="Croquete" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Croquete</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/salgados/kibe.jpeg" alt="Kibe" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Kibe</p>
            </div>
        </div>
    </section>

    <!-- Salgados Assados -->
    <section class="max-w-5xl mx-auto py-8 px-4">
        <h3 class="text-2xl font-semibold text-orange-500 underline underline-offset-8 mb-6">Salgados Assados</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/jardineira.jpg" alt="Jardineira" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Jardineira</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/mistao.jpeg" alt="Misto" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Mistão</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/Hamburguer.jpg" alt="Hamburguer" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Hamburguer</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/carne.jpeg" alt="Carne" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Carne</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/frango.jpg" alt="Frango" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Frango</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/calabresa.jpg" alt="Calabresa" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Calabresa</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/salsicha.jpg" alt="Salsicha" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Salsicha</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/palmito.jpg" alt="Palmito" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Palmito</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center border border-gray-200">
                <img src="images/assados/brocolis.jpg" alt="Brócolis" class="w-40 h-40 mb-3 rounded-xl">
                <p class="font-medium text-gray-800">Brócolis</p>
            </div>
        </div>
    </section>

    <!-- Ofertas / Serviços -->
    <section class="bg-orange-50 py-12" id="services">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-10">
                <span class="text-orange-500 text-xl font-bold">Ofertas</span>
                <h2 class="text-3xl font-semibold text-gray-800 mt-2">Nossos Serviços</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <i class="fa fa-trophy text-4xl text-orange-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2 text-gray-800 text-center">A melhor salgadaria da região
                        centro mogi-miriano!</h3>
                    <p class="text-gray-600 text-center">Salgadaria destaque na região!</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <i class="fa-solid fa-burger text-4xl text-orange-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2 text-gray-800 text-center">Temos uma variedade de salgados
                        para todos os gostos!</h3>
                    <p class="text-gray-600 text-center">Experimente nosso típico salgadinho de alho!</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                    <i class="fa fa-motorcycle text-4xl text-orange-500 mb-4"></i>
                    <h3 class="font-semibold text-lg mb-2 text-gray-800 text-center">Também oferecemos serviço
                        delivery</h3>
                    <p class="text-gray-600 text-center">Consuma nossos salgados no conforto da sua casa!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-100 py-8 mt-12">
        <div class="max-w-5xl mx-auto px-4 flex flex-col items-center">
            <img src="images/logo.png" alt="Casa dos Salgados" class="w-24 h-24 mb-4 object-contain">
            <p class="text-sm mb-2">Copyright 2025 <span class="text-orange-400">Casa dos Salgados</span> Todos Direitos
                Reservados </p>
            <p class="text-sm mb-1">Tel: (19)99635-9428</p>
            <p class="text-sm">E-mail: casadossalgadosmm@hotmail.com.br</p>
        </div>
    </footer>

    <!-- Botão Voltar ao Topo -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 bg-orange-500 text-white p-3 rounded-full shadow-lg hover:bg-orange-600 transition hidden z-50">
        <i class="fa fa-arrow-up"></i>
    </button>

    <script>
        //Botão para voltar ao topo
        var btn = document.querySelector("#back-to-top");
        window.onscroll = function () {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        };
        btn.addEventListener("click", function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    </script>
</body>

</html>