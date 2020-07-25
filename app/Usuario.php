<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    protected $table = 'usuarios';

    public static function todos(): array
    {
        try {
            $usuarios = self::all()
                            ->toArray();
            return [
                'error' => false,
                'Usuarios' => $usuarios
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'mensaje' => 'Error al traer los usuarios'
            ];
        }
    }

    public static function crear($request): array
    {
        return self::all()->toArray();
    }
}
