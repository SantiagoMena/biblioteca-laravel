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
        return json_encode(['Libros' => []]);
    }

    /**
     * Crear Libros
     *
     * @return \Illuminate\Http\Response
     */
    public function crearLibros()
    {
        return json_encode(['Libros' => []]);
    }
}
