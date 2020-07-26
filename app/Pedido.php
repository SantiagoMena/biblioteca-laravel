<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    use SoftDeletes;
    /**
     * Relationships
     */
    public function libro(): object
    {
        return $this->belongsTo('App\Libro', 'libro_id', 'id');
    }

    public function biblioteca(): object
    {
        return $this->belongsTo('App\Biblioteca', 'biblioteca_id', 'id');
    }

    public static function todos(): array
    {
        try {
            $pedidos = DB::table('pedidos')
                        ->leftJoin('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id')
                        ->leftJoin('libros', 'pedidos.libro_id', '=', 'libros.id')
                        ->select(
                            'pedidos.id AS id', 
                            'usuarios.nombre AS usuario', 
                            'libros.nombre AS libro', 
                            'pedidos.estado AS estado'
                        )
                        ->get();
            return [
                'error' => false,
                'Pedidos' => $pedidos,
            ];

        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => $th->errorInfo
            ];
        }
    }

    public static function entregar(int $usuario_id, int $libro_id): array
    {
        try {
            $pedido = self::where('estado', 'Prestado')
                        ->where('usuario_id', $usuario_id)
                        ->where('libro_id', $libro_id)
                        ->first();
                        
            if( !$pedido ) {
                return [
                    'error' => true,
                    'mensaje' => 'Pedido no encontrado'
                ];
            }
            
            $pedido->estado = 'Regresado';
            $isUpdate = $pedido->save();
            if( !$isUpdate ) {
                return [
                    'error' => true,
                    'mensaje' => 'Error al entregar pedido.'
                ];
            }

            return [
                'error' => false,
                'Pedido' => $pedido
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => $th
            ];
        }
    }

    public static function pedir(int $usuario_id, int $libro_id): array
    {
        try {
            $libro = Libro::find($libro_id);
            if(!$libro) {
                return [
                    'error' => true,
                    'mensaje' => 'El libro no existe'
                ];
            }

            $pedidoExistente = self::where('libro_id', $libro_id)
                                    ->where('estado', 'Prestado')
                                    ->first();
            if($pedidoExistente) {
                return [
                    'error' => true,
                    'mensaje' => 'El libro se encuentra prestado por el momento'
                ];
            }

            $pedido = new self();
            $pedido->estado = 'Prestado';
            $pedido->usuario_id = $usuario_id;
            $pedido->libro_id = $libro_id;
            if($pedido->save()) {
                return [
                    'error' => false,
                    'Pedido' => $pedido
                ];
            } else {
                return [
                    'error' => true,
                    'Pedido' => 'Error al guardar el pedido'
                ];
            }
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => $th
            ];
        }
    }
}
