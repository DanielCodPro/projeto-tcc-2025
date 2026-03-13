1️⃣ Estrutura do Laravel

🖼️ Imagem mostrando a pasta app/, routes/, resources/ e public/.

Explica visualmente que é onde ficam Controllers, Models, Views, rotas e arquivos públicos.

2️⃣ Criando um projeto

🖼️ Screenshot do terminal:

composer create-project laravel/laravel nome-do-projeto

Mostra a criação do projeto Laravel.

3️⃣ Rodando o servidor local

🖼️ Terminal com:

php artisan serve

Mostra URL: http://127.0.0.1:8000 aberta no navegador.

4️⃣ Criando rotas

🖼️ Arquivo routes/web.php aberto, mostrando:

Route::get('/', function () {
    return view('welcome');
});

Explica visualmente como acessar páginas.

5️⃣ Criando Controllers

🖼️ Terminal com:

php artisan make:controller ProdutoController

Mostra estrutura do Controller criada na pasta app/Http/Controllers/.

6️⃣ Criando Models e Migrations

🖼️ Terminal com:

php artisan make:model Produto -m

Mostra criação do Model e da migration para banco de dados.

7️⃣ Migrando banco de dados

🖼️ Terminal com:

php artisan migrate

Mostra tabelas criadas visualmente no banco de dados.

8️⃣ Instalando dependências JS/CSS

🖼️ Terminal com:

npm install
npm run dev

Mostra frontend sendo compilado com Vite.

9️⃣ Criando views

🖼️ Pasta resources/views com arquivo welcome.blade.php.

Mostra a página inicial carregando no navegador.
