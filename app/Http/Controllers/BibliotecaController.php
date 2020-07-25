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
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearBibliotecas(Request $request)
    {
        return Biblioteca::crear($request);
    }
}
