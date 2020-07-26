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
    public function entregarLibros(int $usuario_id, int $libro_id)
    {
        return Pedido::entregar($usuario_id, $libro_id);
    }


    /**
     * Obtener todos los pedidos
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerPedidos()
    {
        return Pedido::todos();
    }

}
