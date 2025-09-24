<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Integrantes do TCC</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .card-shadow {
      box-shadow: 0 6px 20px rgba(255, 140, 0, 0.12);
    }
  </style>

  <link rel="icon" type="image/png" href="{{ asset('images/ícone.png') }}">
</head>

<body class="bg-gradient-to-br from-orange-50 via-white to-orange-100 min-h-screen font-sans text-gray-800">

  <!-- Header -->
  <header
    class="bg-gradient-to-r from-orange-500 to-orange-400 text-white py-10 text-center shadow-lg rounded-b-3xl relative">
    <div class="max-w-6xl mx-auto px-6 flex flex-col items-center md:flex-row md:justify-between md:items-center">
      <div class="mb-6 md:mb-0">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">Integrantes do TCC</h1>
        <p class="text-lg md:text-xl font-medium opacity-90 pt-4">Conheça nosso grupo e projeto</p>
      </div>
      <a href="{{ route('user.index') }}"
        class="bg-white px-6 py-2 rounded-full shadow-md font-bold text-sm md:text-base">
        <p class="text-orange-500">Voltar</p>
      </a>
    </div>
  </header>

  <!-- Foto em grupo -->
  <section class="max-w-5xl mx-auto p-8 text-center">
    <div
      class="overflow-hidden rounded-3xl shadow-2xl border-4 border-orange-400 mx-auto w-full max-w-[800px] h-[600px] md:h-[800px] flex items-center justify-center bg-white">
      <img src="{{ asset('images/alunos/grupo.jpg') }}" alt="Foto em grupo"
        class="object-cover object-center w-full h-full">
    </div>
  </section>

  <!-- Texto de apresentação -->
  <section
    class="max-w-3xl mx-auto px-6 md:px-12 py-10 text-center bg-white rounded-2xl shadow-lg border border-orange-100">
    <h2 class="text-3xl font-bold mb-4 text-orange-500">Sobre o nosso projeto</h2>
    <p class="text-gray-700 text-lg leading-relaxed">
      Nosso TCC tem como objetivo desenvolver soluções inovadoras para o setor alimentício, utilizando tecnologias
      modernas como Laravel, TailwindCSS e MySQL. O projeto busca otimizar processos, promover aprendizado e gerar
      impacto positivo na comunidade acadêmica e local. Feito por alunos do curso de Análise e Desenvolvimento de
      Sistemas da ETEC Pedro Ferreira Alves.
    </p>
  </section>

  <!-- Alunos -->
  <main class="max-w-6xl mx-auto px-6 md:px-12 py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
    @php
      $alunos = [
        ['img' => 'kauan.jpg', 'nome' => 'Kauan', 'funcao' => 'Desenvolvedor Full Stack'],
        ['img' => 'gu.jpg', 'nome' => 'Gustavo', 'funcao' => 'Marketing'],
        ['img' => 'Daniel.jpg', 'nome' => 'Daniel', 'funcao' => 'Desenvolvedor'],
        ['img' => 'jadon.jpg', 'nome' => 'Jadon', 'funcao' => 'Desenvolvedor'],
        ['img' => 'matheus.jpg', 'nome' => 'Matheus', 'funcao' => 'Documentador'],
        ['img' => 'du.jpg', 'nome' => 'Eduardo', 'funcao' => 'Testador'],
      ];
    @endphp

    @foreach($alunos as $aluno)
      <div
        class="bg-white rounded-3xl card-shadow hover:shadow-orange-300 transform hover:-translate-y-2 transition-all duration-300 p-8 text-center flex flex-col items-center border border-orange-100">
        <div
          class="overflow-hidden rounded-2xl shadow-lg border-2 border-orange-400 w-44 h-60 mb-5 bg-orange-50 flex items-center justify-center">
          <img src="{{ asset('images/alunos/' . $aluno['img']) }}" alt="{{ $aluno['nome'] }}"
            class="object-cover object-top w-full h-full transition-transform duration-500 hover:scale-110">
        </div>
        <h2 class="text-2xl font-bold text-orange-500 mb-1">{{ $aluno['nome'] }}</h2>
        <p class="text-gray-700 font-medium">Curso: ADS</p>
        <p class="text-gray-500 text-sm mt-2 italic">Função: {{ $aluno['funcao'] }}</p>
      </div>
    @endforeach
  </main>

  <!-- Footer -->
  <footer
    class="bg-gradient-to-r from-orange-500 to-orange-400 text-white text-center py-6 mt-16 rounded-t-3xl shadow-inner">
    <p class="text-sm">© 2025 <span class="font-semibold">Casa dos Salgados</span> - Todos os Direitos Reservados</p>
  </footer>

</body>

</html>