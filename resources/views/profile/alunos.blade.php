<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Integrantes do TCC</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

  <!-- Header -->
  <header class="bg-gradient-to-r from-orange-500 to-orange-400 text-white py-10 text-center shadow-md rounded-b-3xl">
    <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">Integrantes do TCC</h1>
  </header>

  <!-- Foto em grupo -->
  <section class="max-w-5xl mx-auto p-8 text-center">
    <img src="{{ asset('images/grupo.jpg') }}" 
         alt="Foto em grupo" 
         class="mx-auto rounded-2xl shadow-xl w-full md:w-[850px] h-[500px] object-cover border-4 border-white">
  </section>

  <!-- Texto de apresentação -->
  <section class="max-w-3xl mx-auto px-6 md:px-12 py-10 text-center">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Sobre o nosso projeto</h2>
    <p class="text-gray-600 text-lg leading-relaxed">
      Aqui você pode escrever uma introdução sobre o TCC, contando qual foi o objetivo, a área de estudo,
      as tecnologias usadas e o impacto do trabalho. Essa parte serve como uma apresentação geral do grupo.
    </p>
  </section>

  <!-- Alunos -->
  <main class="max-w-6xl mx-auto px-6 md:px-12 py-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

    <!-- Card de aluno -->
    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center">
      <img src="images/kauan.jpg" alt="Kauan" class="mx-auto w-48 h-48 rounded-full mb-4 object-cover object-top shadow-md border-2 border-orange-400">
      <h2 class="text-xl font-bold text-gray-800">Kauan</h2>
      <p class="text-gray-600">Curso: ADS</p>
      <p class="text-gray-500 text-sm mt-2 italic">Função: Desenvolvedor</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center">
      <img src="images/gu.jpg" alt="Gustavo" class="mx-auto w-48 h-48 rounded-full mb-4 object-cover object-top shadow-md border-2 border-orange-400">
      <h2 class="text-xl font-bold text-gray-800">Gustavo</h2>
      <p class="text-gray-600">Curso: ADS</p>
      <p class="text-gray-500 text-sm mt-2 italic">Função: Designer</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center">
      <img src="images/Daniel.jpg" alt="Daniel" class="mx-auto w-48 h-48 rounded-full mb-4 object-cover object-top shadow-md border-2 border-orange-400">
      <h2 class="text-xl font-bold text-gray-800">Daniel</h2>
      <p class="text-gray-600">Curso: ADS</p>
      <p class="text-gray-500 text-sm mt-2 italic">Função: Testador</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center">
      <img src="images/jadon.jpg" alt="Jadon" class="mx-auto w-48 h-48 rounded-full mb-4 object-cover object-top shadow-md border-2 border-orange-400">
      <h2 class="text-xl font-bold text-gray-800">Jadon</h2>
      <p class="text-gray-600">Curso: ADS</p>
      <p class="text-gray-500 text-sm mt-2 italic">Função: Documentador</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center">
      <img src="images/matheus.jpg" alt="Matheus" class="mx-auto w-48 h-48 rounded-full mb-4 object-cover object-top shadow-md border-2 border-orange-400">
      <h2 class="text-xl font-bold text-gray-800">Matheus</h2>
      <p class="text-gray-600">Curso: ADS</p>
      <p class="text-gray-500 text-sm mt-2 italic">Função: Analista</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center">
      <img src="images/du.jpg" alt="Eduardo" class="mx-auto w-48 h-48 rounded-full mb-4 object-cover object-top shadow-md border-2 border-orange-400">
      <h2 class="text-xl font-bold text-gray-800">Eduardo</h2>
      <p class="text-gray-600">Curso: ADS</p>
      <p class="text-gray-500 text-sm mt-2 italic">Função: Apoio Técnico</p>
    </div>

  </main>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-orange-500 to-orange-400 text-white text-center py-6 mt-12 rounded-t-3xl shadow-inner">
    <p class="text-sm">© 2025 <span class="font-semibold">Casa dos Salgados</span> - Todos os Direitos Reservados</p>
  </footer>

</body>
</html>
