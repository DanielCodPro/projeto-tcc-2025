<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Http\Controllers\PagamentoController;


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
//rotas da página de pagamentos
Route::get('/', function () {
    return view('/pagamento');
});

Route::get('/checkout', [PagamentoController::class, 'checkout']);
Route::get('/pagamento/sucesso', [PagamentoController::class, 'sucesso']);
Route::get('/pagamento/falha', [PagamentoController::class, 'falha']);
Route::get('/pagamento/pendente', [PagamentoController::class, 'pendente']);



//Rota para o menu
Route::get('/', function () {
    return redirect('/menu'); // Redireciona automaticamente para a página do menu toda vez que rodar o comando "php artisan serve"
});

Route::get('/menu', function () {
    return view('menu'); 
});

//Rota para a pagina de confirmacao
Route::get('/checkout', function () {
    return view('checkout');
});

//rota página admin
Route::get('/admin', function () {
    return view('admin');
});

//rotas sobre a pagina de pedidos
Route::post('/pedido', [PedidoController::class, 'store']);

Route::get('/pedidos', function () {
    return view('pedidos', ['pedidos' => Pedido::all()]);
});
Route::post('/pedidos/{id}/status', function ($id, Request $request) {
    $status = $request->input('status');

    if ($status === 'entregue') {
        // Se o pedido for entregue, exclui do banco de dados
        Pedido::where('id', $id)->delete();
    } else {
        // Apenas atualiza o status normalmente
        Pedido::where('id', $id)->update(['status' => $status]);
    }

    return back();
});

require __DIR__.'/auth.php';
