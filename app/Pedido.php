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
}
