<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Redireciona para a página principal ao iniciar
Route::get('/', function () {
    return redirect('/cadastro');
});

// Rotas para usuário (userPages) -------
// Rota página de cadastro
Route::get('/cadastro', function () {
    return view('userPages.cadastro');
})->name('cadastro');

// Rota que recebe o formulário de cadastro
Route::post('/cadastro', function (Request $request) {
    // Pega os dados enviados
    $nome = $request->input('nome');
    $email = $request->input('email');
    $telefone = $request->input('telefone');

    //salva no banco com Model
    $usuario = new Usuario();
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->telefone = $telefone;
    $usuario->save();

    // Verifica se o usuário já existe
    $usuarioExistente = Usuario::where('email', $email)->first();
    if ($usuarioExistente) {
        // Usuário já cadastrado, redireciona para a página de login
        return redirect()->route('entrar')->with('mensagem', 'Usuário já cadastrado!');
    }

    // Depois do cadastro, manda pra página de login
    return redirect()->route('test');
})->name('cadastro.submit');

//Rota página de login
Route::get('/entrar', function () {
    return view('userPages.entrar');
})->name('entrar');

/// Rota que recebe o formulário de login
Route::post('/entrar', [UsuarioController::class, 'entrar'])->name('entrar.submit');

// Rota logout
Route::get('/logout', function () {
    session()->forget('usuario_id');
    session()->flush(); // Limpa todos os dados da sessão
    return redirect('/')->with('mensagem', 'Logout realizado com sucesso!');
})->name('logout');


// Rotas Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Página Principal
Route::get('/index', function () {
    return view('userPages.index');
})->name('user.index');

// Página de Menu
Route::get('/menu', function () {
    return view('userPages.menu');
})->name('user.menu');

Route::get('/menu', [MenuController::class, 'index']);//Rota sobre a função da página de menu

Route::get('/pagamento', function () {
    return view('userPages.pagamento');
})->name('user.pagamento');

// Rota página de checkout
Route::get('/checkout', function () {
    $usuario = session('usuario'); // ou Auth::user() se estiver usando autenticação Laravel

    return view('userPages.checkout', [
        'produtos' => Produto::all(),
        'usuario' => $usuario,
    ]);
})->name('user.checkout');

// Rotas para o controller de pagamento
Route::get('/pagamento/checkout', [PagamentoController::class, 'checkout']);
Route::get('/pagamento/sucesso', [PagamentoController::class, 'sucesso']);
Route::get('/pagamento/falha', [PagamentoController::class, 'falha']);
Route::get('/pagamento/pendente', [PagamentoController::class, 'pendente']);



// Rotas para administrador (adminPages) com middleware aplicado -------
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
        return view('adminPages.admin');
    })->name('admin');
    
    //Rota página de pedidos
    Route::get('/pedidos', function () {
        return view('adminPages.pedidos', ['pedidos' => Pedido::all()]);
    })->name('admin.pedidos');
    
    // Ações com pedidos
    Route::post('/pedido', [PedidoController::class, 'store']);
    Route::post('/pedidos/{id}/status', function ($id, Request $request) {
        $status = $request->input('status');
    
        if ($status === 'entregue') {
            Pedido::where('id', $id)->delete();
        } else {
            Pedido::where('id', $id)->update(['status' => $status]);
        }
    
        return back();
    });
    
    Route::prefix('/adminPages/produtos')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
        Route::get('/create', [ProdutoController::class, 'create'])->name('produtos.create');
        Route::post('/', [ProdutoController::class, 'store'])->name('produtos.store');
        Route::get('/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
        Route::put('/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
        Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    })->name('produtos');
});



require __DIR__.'/auth.php';
