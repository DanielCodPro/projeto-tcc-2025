<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa dos Salgados</title>

    <!--SEO e meta tags ajudam os motores de busca (como o Google) a entender melhor o conteúdo do seu site, aqui to adicinando as mais essenciais-->
    <!-- Meta descrição (aparece no Google) -->
    <meta name="description"
        content="Deliciosos salgados feitos com carinho! Venha conhecer a Casa dos Salgados, destaque em Mogi Mirim. Drive-thru e atendimento especial!">

    <!-- Meta palavras-chave (menos usada hoje, mas pode incluir) -->
    <meta name="keywords" content="salgados, salgadaria, Mogi Mirim, comida rápida, festa, delivery, drive-thru">

    <!-- Meta autor -->
    <meta name="author" content="Casa dos Salgados">

    <!-- Define o idioma para SEO -->
    <meta name="language" content="pt-BR">

    <!-- Open Graph (Facebook e redes sociais) -->
    <meta property="og:title" content="Casa dos Salgados - Os Melhores Salgados de Mogi Mirim">
    <meta property="og:description"
        content="Experimente nossos salgados irresistíveis. Atendimento de qualidade e drive-thru.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="https://www.casadossalgados.com.br">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Casa dos Salgados">
    <meta name="twitter:description" content="A melhor salgadaria da região de Mogi Mirim!">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/formatacao.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <!--Inicio do Home-->
    <header class="max-width " id="home">
        <div class="container">
            <div class="menu">
                <div class="logo" id="logo"></div>
                <div class="desktop-menu">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">Sobre</a></li>
                        <li><a href="#services">Serviços</a></li>
                        <li><a href="{{ url(path: '/menu') }}">Menu</a></li>
                        <li><a href="#contato">Contato</a></li>


                    </ul>
                </div>
            </div>

            <div class="local"></div>
            <div class="grid h-48 grid-cols-2 place-content-between gap-4 ... meio " id="grid">
                <div class=""> <span class="color-laranja text-title underline underline-offset-8 ">Sobre Nós</span>
                    <p class="text-md color-cinza-1 espaco1">A Casa dos Salgados é uma empresa familiar que começou com
                        a paixão
                        por salgados. Oferecemos diversos salgados excepcionais e uma experiência única para todos os
                        clientes! Você vai amar!</p>
                </div>
                <div>
                    <div class="salgadaria espaco2 "></div>
                </div>
                <div class="conjunto "></div>
                <div class="explicacao "> <span class="color-laranja text-title underline underline-offset-8 meio ">Salgados Fritos</span>
                    <p class="text-md color-cinza-1">A lanchonete Casa dos salgados, depois de se mudar da rua... foi
                        para a rua Doutor Ulhoua Cintra, tentar novas experiências e mudou dos salgados normais e
            </div>
        </div>

             <div class="grid h-48 grid-cols-2 place-content-between gap-4 ... salgados " id="grid">
                <div> <span class="color-laranja text-title underline underline-offset-8 ">Sobre Nós</span>
                    <p class="text-md color-cinza-1 espaco1">A Casa dos Salgados é uma empresa familiar que começou com
                        a paixão
                        por salgados. Oferecemos diversos salgados excepcionais e uma experiência única para todos os
                        clientes! Você vai amar!</p>
                </div>
                <div>
                    <div class="pastel espaco2 "></div>
                </div>
                
                <div class="kuat "></div>
                <div class="explicacao"> <span class="color-laranja text-title underline underline-offset-8 salgados ">Salgados Fritos</span>
                    <p class="text-md color-cinza-1">A lanchonete Casa dos salgados, depois de se mudar da rua... foi
                        para a rua Doutor Ulhoua Cintra, tentar novas experiências e mudou dos salgados normais e
            </div>
       
        </div>

     
       <div> <span class="color-laranja  underline underline-offset-8 logo-fritos">Salgados Fritos</span>

        <div class="flex items-stretch md:items-center ... fritos">
            <div class="py-4">
                <p class="text-md color-cinza-1 coxa">Coxinha
                <div class="coxinha "></div>
                </p>
            </div>
            
            <div class="py-12">
                
                <p class="text-md color-cinza-1 pastelaria boli">Bolinha De Queijo
                <div class="bolinha"></div>
                </p>
            </div>
            <div class="py-8">
                <p class="text-md color-cinza-1 pastelaria pre">presunto</p>
                <div class="presunto"></div>
            </div>
        </div>



        <div class="flex items-stretch md:items-center ... ">
            <div class="py-4">
                <p class="text-md color-cinza-1 pastelaria">Queijo Com Alho
                <div class="alho "></div>
                </p>
            </div>
            <div class="py-12">
                <p class="text-md color-cinza-1 pastelaria">Milho Com Catupiry
                <div class="milho"></div>
                </p>
            </div>
            <div class="py-8">
                <p class="text-md color-cinza-1 pastelaria">Calabresa</p>
                <div class="calabresa"></div>
            </div>
        </div>



        <div class="flex items-stretch md:items-center ... assadao ">
            <div class="py-4">
                <p class="text-md color-cinza-1 pastelaria">Salsicha
                <div class="salsicha "></div>
                </p>
            </div>
            <div class="py-12">
                <p class="text-md color-cinza-1 pastelaria">Croquete
                <div class="croquete"></div>
                </p>
            </div>
            <div class="py-8">
                <p class="text-md color-cinza-1 pastelaria">Kibe</p>
                <div class="kibe"></div>
            </div>
        </div>


         <span class="color-laranja  underline underline-offset-8 logo-fritos assadao">Salgados Assados</span> 

          <div class="flex items-stretch md:items-center ... fritos">
            <div class="py-4">
                <p class="text-md color-cinza-1 coxa">jardineira
                <div class="jardineira "></div>
                </p>
            </div>
            
            <div class="py-12">
                
                <p class="text-md color-cinza-1 pastelaria boli">misto
                <div class="misto"></div>
                </p>
            </div>
            <div class="py-8">
                <p class="text-md color-cinza-1 pastelaria pre">hamburguer</p>
                <div class="hamburg"></div>
            </div>
        </div>



        <div class="flex items-stretch md:items-center ... ">
            <div class="py-4">
                <p class="text-md color-cinza-1 pastelaria">carne
                <div class="carne "></div>
                </p>
            </div>
            <div class="py-12">
                <p class="text-md color-cinza-1 pastelaria">frango
                <div class="frango"></div>
                </p>
            </div>
            <div class="py-8">
                <p class="text-md color-cinza-1 pastelaria">Calabresa</p>
                <div class="calabresa"></div>
            </div>
        </div>



        <div class="flex items-stretch md:items-center ... ">
            <div class="py-4">
                <p class="text-md color-cinza-1 pastelaria">salsicha
                <div class="salsicha "></div>
                </p>
            </div>
            <div class="py-12">
                <p class="text-md color-cinza-1 pastelaria">palmito
                <div class="palmito"></div>
                </p>
            </div>
            <div class="py-8">
                <p class="text-md color-cinza-1 pastelaria">brocolis</p>
                <div class="brocolis"></div>
            </div>
        </div>


        <!--Inicio do Service-->
        <section class="max-width" id="services">
            <div class="content">
                <div class="titulo">
                    <span class="color-laranja text-title">Ofertas</span>
                    <h2 class="color-cinza-1 text-md">Nossos Serviços</h2>
                </div>
                <div class="down">
                    <div class="box">
                        <i class="fa fa-cutlery text-gd color-laranja" aria-hidden="true"></i>
                        <h2> A melhor salgadaria da região centro mogi-miriano!</h2>
                        <p>Salgadaria destaque na região!</p>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-burger text-gd color-laranja"></i>
                        <h2> Temos uma variedade de salgados para todos os gostos!</h2>
                        <p>Experimente nosso típico salgadinho de alho!</p>
                    </div>
                    <div class="box">
                        <i class="fa fa-motorcycle text-gd color-laranja" aria-hidden="true"></i>
                        <h2>Também oferecemos serviço drive-thru</h2>
                        <p>Consuma nossos salgados no conforto da sua casa!</p>
                    </div>
                </div>
            </div>
        </section>

        <!--Inicio do Footer-->
        <footer id="contato">
            <div class="container">
                <img src="images/logo.png" alt="">
                <p class="text-pq">Copyright 2025 <span class="color-laranja">Casa dos Salgados</span> All Rights
                    Reserved
                </p>
                <p>Tel: (19)99635-9428</p>
                <p>E-mail:casadossalgadosmm@hotmail.com.br</p>
            </div>
        </footer>
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