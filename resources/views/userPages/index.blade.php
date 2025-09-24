@php
    use App\Models\Usuario;

    $usuario = null;
    if (session()->has('usuario_id')) {
        $usuario = Usuario::find(session('usuario_id'));
    }

    $pedido = null;
    if (session()->has('pedido_id')) {
        $pedido = \App\Models\Pedido::find(session('pedido_id'));
        if ($pedido && $pedido->status === 'entregue') {
            session()->forget('pedido_id');
            $pedido = null;
        }
    }
@endphp

<!DOCTYPE html>
<html lang="pt-BR" class="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa dos Salgados</title>

    <!--SEO e meta tags ajudam os motores de busca (como o Google) a entender melhor o conteúdo do seu site, aqui to adicinando as mais essenciais-->
    <!-- Meta descrição (aparece no Google) -->
    <meta name="description"
        content="Deliciosos salgados feitos com carinho! Venha conhecer a Casa dos Salgados, destaque em Mogi Mirim. Delivery e atendimento especial!">

    <!-- Meta palavras-chave (menos usada hoje, mas pode incluir) -->
    <meta name="keywords" content="salgados, salgadaria, Mogi Mirim, comida rápida, festa, delivery">

    <!-- Meta autor -->
    <meta name="author" content="Casa dos Salgados">

    <!-- Define o idioma para SEO -->
    <meta name="language" content="pt-BR">

    <!-- Open Graph (Facebook e redes sociais) -->
    <meta property="og:title" content="Casa dos Salgados - Os Melhores Salgados de Mogi Mirim">
    <meta property="og:description" content="Experimente nossos salgados irresistíveis. Atendimento de qualidade.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="https://www.casadossalgados.com.br">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Casa dos Salgados">
    <meta name="twitter:description" content="A melhor salgadaria da região de Mogi Mirim!">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"> <!-- Não utilizar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=order_approve" />

    <link rel="icon" type="image/png" href="{{ asset('images/ícone.png') }}">
</head>

<body>
    <!--Inicio do Home-->
    <main id="home">
        <header class="max-width ">
            <div class="container">
                <div class="menu">
                    <div class="top-bar">
                        <div class="logo" id="logo"></div>
                        <div class="user">
                            <i class="fa-solid fa-user"></i>
                            @if ($usuario)
                                <p class="text-gray-700">{{ $usuario->nome }}</p>
                            @else
                                <p class="text-gray-700">Visitante</p>
                            @endif
                        </div>
                    </div>


                    <div class="desktop-menu">
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">Sobre</a></li>
                            <li><a href="#services">Serviços</a></li>
                            <li><a href="{{ url('/menu') }}">Menu</a></li>
                            <li><a href="#contato">Contato</a></li>
                            <li><a href="{{ route('logout')}}">Sair</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Início do Call -->
                <div class="call">
                    <div class="left">
                        <!--slider de imagens-->
                        <div class="slider">
                            <div class="slides">
                                <div class="slide"><img src="images/slider/1.png" alt="Salgado 1"></div>
                                <div class="slide"><img src="images/slider/2.png" alt="Salgado 2"></div>
                                <div class="slide"><img src="images/slider/3.png" alt="Salgado 3"></div>
                                <div class="slide"><img src="images/slider/4.png" alt="Salgado 4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <h1 class="color-laranja text-gd">Casa dos Salgados</h1>
                        <h2 class="color-cinza-1 text-md">A melhor salgadaria da região centro mogiana</h2>
                        <p class="text-pq">Quer bater um rango? Clica no botão abaixo e veja nosso cardápio!</p>
                        <button onclick="window.location.href='{{ url('/menu') }}'">Ver Menu</button>
                    </div>
                </div>
            </div>
            <button id="back-to-top">^</button>
            @if(isset($pedido) && $pedido->status !== 'entregue')
                <!-- Overlay escuro -->
                <div id="overlay" class="hidden overlay-bg"></div>

                <!-- Botão Ver Comanda -->
                <button id="abrirComandaBtn" class="comanda-btn"><span class="material-symbols-outlined">
                        order_approve
                    </span></button>

                <!-- Modal de comanda -->
                <div id="comandaModal" class="hidden comanda-modal">
                    <h2>Comanda do Pedido {{ $pedido->id }}</h2>
                    <p><strong>Cliente:</strong> {{ $pedido->nome_cliente }}</p>
                    @if ($pedido->tipo_pedido == 'delivery')
                        <p><strong>Endereço:</strong> {{ $pedido->endereco }}</p>
                        <p><strong>Telefone:</strong> {{ $pedido->telefone }}</p>
                        <p>Seu pedido logo chegará a sua residência!</p>
                    @else
                        <p><strong>Email:</strong> {{ $pedido->email_cliente }}</p>
                        <p><strong>Mesa:</strong> {{ $pedido->mesa }}</p>
                    @endif
                    <p><strong>Itens:</strong></p>
                    <ul>
                        @foreach(json_decode($pedido->itens_pedido, true) as $item)
                            <li>{{ $item['nome'] }} - {{ $item['quantidade'] }}</li>
                        @endforeach
                    </ul>
                    <p><strong>Status:</strong> {{ ucfirst($pedido->status) }}</p>

                    <button id="fecharComandaBtn" class="fechar-btn"><span>X</span></button>
                </div>
            @endif

        </header>
    </main>
    <!--Inicio do About-->
    <section class="max-width " id="about">
        <div class="container">
            <div class="call">
                <div class="left">
                    <span class="color-laranja">Sobre Nós</span>
                    <p class="text-md color-cinza-1">A Casa dos Salgados é uma empresa familiar que começou com a paixão
                        por salgados. Oferecemos diversos salgados excepcionais e uma experiência única para todos os
                        clientes! Você vai amar!</p>
                    <button onclick="window.location.href='{{ url('/saiba') }}'">Saiba mais</button>

                </div>
                <div class="right">
                    <img src="images/esfirras.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!--Inicio da Localização(section que contém a localização da salgadaria)-->
    <section class="max-width" id="localizacao">
        <div class="container">
            <div class="call">
                <div class="left">
                    <span class="color-laranja">Localização</span>
                    <h2 class="color-cinza-1 text-md">Onde nos encontrar?</h2>
                    <p class="text-pq">Estamos localizados no centro de Mogi Mirim, na Rua Dr. Ulhôa Cintra, 665. Venha
                        nos visitar e experimentar nossos deliciosos salgados!</p>
                    <button onclick="window.open('https://maps.app.goo.gl/Sgid9TsVN39qze5F9', '_blank')">Ver no
                        Mapa</button>
                </div>
                <div class="right">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.8685332453274!2d-46.9566726!3d-22.433973500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8f9182b395a11%3A0x889abd9fe7282096!2sCasa%20dos%20Salgados!5e0!3m2!1spt-BR!2sbr!4v1757452772087!5m2!1spt-BR!2sbr"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!--Inicio do Service-->
    <section class="max-width" id="services">
        <div class="content">
            <div class="titulo">
                <span class="color-laranja text-title">Ofertas</span>
                <h2 class="color-cinza-1 text-md">Nossos Serviços</h2>
            </div>
            <div class="down">
                <div class="box">
                    <i class="fa fa-trophy text-gd color-laranja" aria-hidden="true"></i>
                    <h2> A melhor salgadaria da região centro mogi-miriano!</h2>
                    <p>Salgadaria destaque na região! Venha nos visitar!</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-burger text-gd color-laranja"></i>
                    <h2> Temos uma variedade de salgados para todos os gostos!</h2>
                    <p>Experimente nosso típico salgadinho de alho ou nossa gloriosa coxinha da casa!</p>
                </div>
                <div class="box">
                    <i class="fa fa-motorcycle text-gd color-laranja" aria-hidden="true"></i>
                    <h2>Também oferecemos serviço delivery!</h2>
                    <p>Consuma nossos salgados no conforto da sua casa!</p>
                </div>
            </div>
        </div>
    </section>

    <!--Inicio do Footer-->
    <footer id="contato">
        <div class="container">
            <img src="images/logo.png" alt="">
            <p class="text-pq"> © 2025 <span>Casa dos Salgados</span> Todos Direitos Reservados</p>
            <div class="info">
                <p id="tel"><i class="fa fa-phone-square" aria-hidden="true"></i>
                    Tel: (19)99635-9428</p>
                <a id="facebook" href="{{ url('https://www.facebook.com/casadossalgadosMM/?locale=pt_BR') }}"><i
                        class="fa-brands fa-facebook-f"></i>
                    Facebook</a>
                <p id="email"><i class="fa fa-envelope" aria-hidden="true"></i>
                    casadossalgadosmm@hotmail.com.br</p>
                <p id="desenvolvedores"><i class="fa fa-code" aria-hidden="true"></i>
                    <a href="{{ url('/alunos') }}">Desenvolvedores </a></p>
            </div>
        </div>
    </footer>
    <script>

        //Botão para voltar ao topo
        var btn = document.querySelector("#back-to-top");
        var comandaBtn = document.querySelector(".comanda-btn");
        var backToTopTimeout = null;

        window.onscroll = function () {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                // Limpa timeout anterior se o usuário continuar rolando
                if (backToTopTimeout) clearTimeout(backToTopTimeout);
                // Só mostra após 2 segundos
                backToTopTimeout = setTimeout(function () {
                    btn.style.display = "block";
                    if (comandaBtn) comandaBtn.classList.remove('hide-comanda');
                }, 500); // 500ms para mostrar o botão
            } else {
                if (backToTopTimeout) clearTimeout(backToTopTimeout);
                btn.style.display = "none";
                if (comandaBtn) comandaBtn.classList.add('hide-comanda');
            }
        };

        // Adiciona o evento de clique para voltar ao topo
        btn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Modal de Comanda
        document.addEventListener('DOMContentLoaded', function () {
            const abrirComandaBtn = document.getElementById('abrirComandaBtn');
            const fecharComandaBtn = document.getElementById('fecharComandaBtn');
            const comandaModal = document.getElementById('comandaModal');
            const overlay = document.getElementById('overlay');

            if (abrirComandaBtn && fecharComandaBtn && comandaModal && overlay) {
                abrirComandaBtn.addEventListener('click', () => {
                    comandaModal.classList.remove('hidden');
                    overlay.classList.remove('hidden');
                    abrirComandaBtn.classList.add('hidden'); // Esconde o botão
                });

                fecharComandaBtn.addEventListener('click', () => {
                    comandaModal.classList.add('hidden');
                    overlay.classList.add('hidden');
                    abrirComandaBtn.classList.remove('hidden'); // Mostra o botão novamente se quiser
                });
            }
        });
    </script>
</body>

</html>