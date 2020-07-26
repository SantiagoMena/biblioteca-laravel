<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Obtener Libros
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerLibros()
    {
        return Libro::todos();
    }

    /**
     * Crear Libros
     *  
     * @return \Illuminate\Http\Response
     */
    public function crearLibros(Request $request)
    {
        return Libro::crear($request);
    }
}
