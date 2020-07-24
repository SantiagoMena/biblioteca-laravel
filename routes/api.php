<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Usuarios
 */
Route::prefix('usuarios')->group(function() {
    /**
     * Obtener usuarios [ +pedidos +libros]
     */
     Route::get('/','UsuarioController@obtenerUsuarios')->name('obtenerUsuarios');
    
    /**
     * Crear un usuario
     */
    Route::post('/', 'UsuarioController@crearUsuarios')->name('crearUsuarios');
});

/**
 * Bibliotecas
 */
Route::prefix('bibliotecas')->group(function() {
    /**
     * Obtener bibliotecas [ +pedidos +libros]
     */
    Route::get('/', 'BibliotecaController@obtenerBibliotecas')->name('obtenerBibliotecas');
    
    /**
     * Crear una biblioteca
     */
    Route::post('/', 'BibliotecaController@crearBibliotecas')->name('crearBibliotecas');
});

/**
 * Libros
 */
Route::prefix('libros')->group(function() {
    /**
     * Obtener libros [ +pedidos +usuarios +estado ]
     */
    Route::get('/', 'LibroController@obtenerLibros')->name('obtenerLibros');
    
    /**
     * Crear un libros
     */
    Route::post('/', 'LibroController@crearLibros')->name('crearLibros');
});

/**
 * Pedir un libro
 */
Route::post('/pedidos/usuario/{usurio_id}/libro/{libro_id}', 'PedidoController@pedirLibros')->name('pedirLibros');

/**
 * Regresar un libro
 */
Route::put('/entregas/usuario/{usurio_id}/libro/{libro_id}', 'PedidoController@entregarLibros')->name('entregarLibros');