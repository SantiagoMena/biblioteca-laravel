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
    
     Route::get('/', function (Request $request) {
         return json_encode(['Usuario' => []]);
     })
     ->name('obtenerUsuarios');
    
    /**
     * Crear un usuario
     */
    
    Route::post('/', function (Request $request) {
        return json_encode(['Usuario' => []]);
    })
    ->name('crearUsuarios');
});

/**
 * Bibliotecas
 */
Route::prefix('bibliotecas')->group(function() {
    /**
     * Obtener bibliotecas [ +pedidos +libros]
     */
    
    Route::get('/', function (Request $request) {
        return json_encode(['Bibliotecas' => []]);
    })
    ->name('obtenerBibliotecas');
    
    /**
     * Crear una biblioteca
     */
    
    Route::post('/', function (Request $request) {
        return json_encode(['Biblioteca' => []]);
    })
    ->name('crearBibliotecas');
});

/**
 * Libros
 */
Route::prefix('libros')->group(function() {
    /**
     * Obtener libros [ +pedidos +usuarios +estado ]
     */
    
    Route::get('/', function (Request $request) {
        return json_encode(['Libros' => []]);
    })
    ->name('obtenerLibros');
    
    /**
     * Crear un libros
     */
    
    Route::post('/', function (Request $request) {
        return json_encode(['Libro' => []]);
    })
    ->name('crearLibros');
});

/**
 * Pedir un libro
 */
Route::post('/pedidos/usuario/{usurio_id}/libro/{libro_id}', function ($usuario_id, $libro_id) {
    return json_encode(['usuario_id' => $usuario_id, 'libro_id' => $libro_id]);
})
->name('pedirLibros');

/**
 * Regresar un libro
 */
Route::post('/entregas/usuario/{usurio_id}/libro/{libro_id}', function ($usuario_id, $libro_id) {
    return json_encode(['usuario_id' => $usuario_id, 'libro_id' => $libro_id]);
})
->name('entregarLibros');