<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa dos Salgados</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <li><a href="{{ url('/menu') }}">Menu</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                </div>
            </div>
            <div class="call">
                <div class="left">
                    <img src="images/1.png" alt="">
                </div>
                <div class="right">
                    <h1 class="color-laranja text-gd">Casa dos Salgados</h1>
                    <h2 class="color-cinza-1 text-md">A melhor Salgadaria da Região</h2>
                    <p class="text-pq">Venha nos visitar e experimente nossos deliciosos salgados!</p>
                    <button onclick="window.location.href='{{ url('/menu') }}'">Ver Menu</button>
                </div>
            </div>
        </div>
        <button id="back-to-top">^</button>
    </header>

    <!--Inicio do About-->
    <section class="max-width " id="about">
        <div class="container">
            <div class="call">
                <div class="left">
                    <span class="color-laranja text-title">Sobre Nós</span>
                    <p class="text-md color-cinza-1">A Casa dos Salgados é uma empresa familiar que começou com a paixão
                        por salgados. Oferecemos diversos salgados excepcionais e uma experiência única para todos os
                        clientes! Você vai amar!</p>
                    <button>Saiba Mais</button>
                </div>
                <div class="right">
                    <img src="images/5.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!--Inicio do Service-->
    <section class="max-width" id="services">
        <div class="content">
            <div class="titulo">
                <span class="color-laranja text-title">Ofertas</span>
                <h2 class="color-cinza-1 text-md">Nossas Serviços</h2>
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
                    <p>Esperimente nosso típico salgadinho alho!</p>
                </div>
                <div class="box">
                    <i class="fa fa-motorcycle text-gd color-laranja" aria-hidden="true"></i>
                    <h2>Também oferecemos serviço drive-thru</h2>
                    <p>consuma nossos salgados no aconchego da sua casa!</p>
                </div>
            </div>
        </div>
    </section>

    <!--Inicio do Footer-->
    <footer id="contato">
        <div class="container">
            <img src="images/logo.png" alt="">
            <p class="text-pq">Copyright 2025 <span class="color-laranja">Casa dos Salgados</span> All Rights Reserved</p classs="text-pq">
            <p>Tel: (19)99635-9428</p>
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