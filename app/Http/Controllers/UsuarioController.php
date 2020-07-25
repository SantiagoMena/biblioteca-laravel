<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Obtener usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerUsuarios()
    {
        $usuario = new Usuario();
        return $usuario::todos();
    }

    /**
     * Crear usuarios
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearUsuarios(Request $request)
    {
        $usuario = new Usuario();

        return $usuario::crear($request);
    }
}
