<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProdutoController;

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
    return redirect('/index');
});

// Rotas para usuário (userPages) -------
Route::get('/index', function () {
    return view('userPages.index');
})->name('user.index');

Route::get('/menu', function () {
    return view('userPages.menu');
})->name('user.menu');

Route::get('/menu', [MenuController::class, 'index']);//Rota sobre a função da página de menu

Route::get('/pagamento', function () {
    return view('userPages.pagamento');
})->name('user.pagamento');

Route::get('/checkout', function () {
    return view('userPages.checkout');
})->name('user.checkout');

// Rotas para o controller de pagamento
Route::get('/pagamento/checkout', [PagamentoController::class, 'checkout']);
Route::get('/pagamento/sucesso', [PagamentoController::class, 'sucesso']);
Route::get('/pagamento/falha', [PagamentoController::class, 'falha']);
Route::get('/pagamento/pendente', [PagamentoController::class, 'pendente']);

// Rotas para administrador (adminPages) -------
Route::get('/admin', function () {
    return view('adminPages.admin');
})->name('admin');

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
});


require __DIR__.'/auth.php';
