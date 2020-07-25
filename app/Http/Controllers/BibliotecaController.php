<?php

namespace App\Http\Controllers;

use App\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    /**
     * Obtener bibliotecas
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerBibliotecas()
    {
        return Biblioteca::todos();
    }

    /**
     * Crear bibliotecas
     *
     * @return \Illuminate\Http\Response
     */
    public function crearBibliotecas()
    {
        return json_encode(['Bibliotecas' => []]);
    }
}
