<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use SoftDeletes;
    protected $table = 'usuarios';

    /**
     * Relationships
     */
    public function pedidos(): object
    {
        return $this->hasMany('App\Pedido', 'usuario_id', 'id');
    }

    /**
     * Functions
     */
    public static function todos(): array
    {
        try {
            $usuarios = DB::table('usuarios')->select('id', 'nombre')->get();
            return [
                'error' => false,
                'Usuarios' => $usuarios
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => $th->errorInfo
            ];
        }
    }

    public static function crear($request): array
    {
        try {
            $usuario = new self;
            $usuario->nombre = $request->nombre;
            $isSave = $usuario->save();

            if($isSave) {
                return [
                    'error' => false,
                    'Usuario' =>  $usuario->toArray() 
                ];
            } else {
                return [
                    'error' => true,
                    'Usuario' =>  'Error al guardar el usuario' 
                ];
            }

        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => $th->errorInfo
            ];
        }

    }
}
