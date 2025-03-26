<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pedido;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
