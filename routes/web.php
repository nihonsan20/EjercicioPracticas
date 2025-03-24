<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;


Route::get('/', function () {
    return view('pedido');
});

Route::resource('clients', ClientsController::class);


Route::get('/pedido', function(){
    $nombre = session('nombre');
    return view('pedido', compact('nombre'));
})->name('pedido');

Route::post('/registro', [ClientsController::class, 'register'])->name('registro.store');
Route::post('/login', [ClientsController::class, 'login'])->name('login.process');


Route::post('/agregar-producto', [ClientsController::class, 'agregarProducto'])->name('client.agregarProducto');

Route::post('/eliminar-producto', [ClientsController::class, 'eliminarProducto'])->name('client.eliminarProducto');


Route::post('/enviar-pedido', [ClientsController::class, 'enviarPedido'])->name('client.enviarPedido');
Route::get('/orden', [ClientsController::class, 'verOrden'])->name('client.verOrden');

Route::get('/pedido-finalizado', function () {
    return view('pedidoFinalizado');
})->name('client.pedidoFinalizado');
