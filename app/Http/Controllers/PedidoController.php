<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Pedir un libro
     *
     * @return \Illuminate\Http\Response
     */
    public function pedirLibros($usuario_id, $libro_id)
    {
        return json_encode(['usuario_id' => $usuario_id, 'libro_id' => $libro_id]);
    }

    /**
     * Entregar un libro
     *
     * @return \Illuminate\Http\Response
     */
    public function entregarLibros($usuario_id, $libro_id)
    {
        return json_encode(['usuario_id' => $usuario_id, 'libro_id' => $libro_id]);
    }
}
