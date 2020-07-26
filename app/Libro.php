<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Libro extends Model
{
    use SoftDeletes;

    /**
     * Relationships
     */
    public function biblioteca(): object
    {
        return $this->belongsTo('App\Biblioteca', 'biblioteca_id', 'id');
    }

    /**
     * Relationships
     */
    public function pedidos(): object
    {
        return $this->hasMany('App\Pedido', 'pedido_id', 'id');
    }

    /**
     * Obtener todos los libros
     */
    public static function todos(): array
    {
        try {
            $libros = self::all();

            return [
                'error' => false,
                'libros' => $libros
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => $th->errorInfo
            ];
        }
    }

    /**
     * Crear libro
     */
    public static function crear($request): array
    {
        try {
            $libro = new self();
            $libro->nombre = $request->nombre;
            $libro->biblioteca_id = $request->biblioteca_id;

            $isSave = $libro->save();
            if($isSave) {
                return [
                    'error' => false,
                    'Libro' => $libro
                ];
            } else {
                return [
                    'error' => true,
                    'mensaje' => 'Error al crear el libro'
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
