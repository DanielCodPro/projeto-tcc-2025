<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Usuario;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UsuarioController;

// Redireciona para a página principal ao iniciar
Route::get('/', fn() => redirect('/cadastro'));

// ---------------------- Rotas Usuário (userPages) ----------------------

// Cadastro
Route::get('/cadastro', fn() => view('userPages.cadastro'))->name('cadastro');
Route::post('/cadastro', function (Request $request) {
    $nome = $request->input('nome');
    $email = $request->input('email');
    $telefone = $request->input('telefone');

    $usuarioExistente = Usuario::where('email', $email)->first();
    if ($usuarioExistente) {
        return redirect()->route('entrar')->with('mensagem', 'Usuário já cadastrado!');
    }

    $usuario = Usuario::create(compact('nome', 'email', 'telefone'));

    Mail::to($usuario->email)->send(new \App\Mail\WelcomeEmail($usuario));
    
    return redirect()->route('entrar')->with('mensagem', 'Cadastro realizado com sucesso! Faça login para continuar.');
})->name('cadastro.submit');

// Login
Route::get('/entrar', fn() => view('userPages.entrar'))->name('entrar');
Route::post('/entrar', [UsuarioController::class, 'entrar'])->name('entrar.submit');
Route::get('/logout', function () {
    session()->forget('usuario_id');
    session()->flush(); // Limpa todos os dados da sessão
    return redirect('/entrar')->with('mensagem', 'Logout realizado com sucesso!');
})->name('logout');

// Google Login
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Página que requisita o telefone de usuário que logaram com conta Google
Route::get('/telefone', [GoogleController::class, 'formTelefone'])->name('user.telefone');
Route::post('/telefone', [GoogleController::class, 'salvarTelefone'])->name('user.salvarTelefone');


// Páginas do usuário
Route::get('/index', [UsuarioController::class, 'index'])->name('user.index');
Route::get('/menu', [MenuController::class, 'index'])->name('user.menu');
Route::get('/pagamento', fn() => view('userPages.pagamento'))->name('user.pagamento');
Route::get('/saiba', fn() => view('userPages.saiba'))->name('user.saiba');



// Checkout
Route::get('/checkout', function () {
    $usuario = session('usuario');
    return view('userPages.checkout', [
        'produtos' => Produto::all(),
        'usuario' => $usuario,
    ]);
})->name('user.checkout');

Route::prefix('/pagamento')->group(function () {
    Route::get('/checkout', [PagamentoController::class, 'checkout'])->name('checkout.pagamento'); // tela de pagamento
    Route::post('/processar', [PagamentoController::class, 'processar'])->name('processar.pagamento'); // processar o pagamento
    Route::get('/sucesso', [PagamentoController::class, 'sucesso'])->name('sucesso.pagamento');
    Route::get('/falha', [PagamentoController::class, 'falha'])->name('falha.pagamento');
    Route::get('/pendente', [PagamentoController::class, 'pendente'])->name('pendente.pagamento');
});


// ---------------------- Rotas Administrador (adminPages) ----------------------
// Salvar pedido (sem middleware)
Route::post('/pedido', [PedidoController::class, 'store']);

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', fn() => view('adminPages.admin'))->name('admin');

    // Pedidos
    Route::prefix('/adminPages/pedidos')->group(function () {
        Route::get('/locais', function () {
            return view('adminPages.pedidos.pedidosLocais', [
                'pedidos' => Pedido::where('tipo_pedido', 'local')->get()
            ]);
        })->name('admin.pedidosLocais');

        Route::get('/delivery', function () {
            return view('adminPages.pedidos.pedidosDelivery', [
                'pedidos' => Pedido::where('tipo_pedido', 'delivery')->get()
            ]);
        })->name('admin.pedidosDelivery');
    });

    // Atualizar status do pedido
    Route::post('/pedidos/{id}/status', function ($id, Request $request) {
        $status = $request->input('status');
        $pedido = Pedido::find($id);

        if ($pedido) {
            if ($status === 'entregue') {
                $pedido->delete();
            } else {
                $pedido->update(['status' => $status]);
            }
        }

        return back();
    });

    // Produtos
    Route::prefix('/adminPages/produtos')->name('produtos.')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('create');
        Route::post('/', [ProdutoController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProdutoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProdutoController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
