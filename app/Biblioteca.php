<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Biblioteca extends Model
{
    use SoftDeletes;
    /**
     * Relationships
     */
    public function libros(): object
    {
        return $this->hasMany('App\Libro', 'biblioteca_id', 'id');
    }

    /**
     * Obtner todas las bibliotecas
     */
    public static function todos(): array
    {
        try {
            $bibliotecas = DB::table('bibliotecas')
                            ->select('bibliotecas.id AS id', 'bibliotecas.nombre AS nombre', DB::raw('COUNT(libros.id) as libros'))
                            ->leftJoin('libros', 'bibliotecas.id', '=', 'libros.biblioteca_id' )
                            ->groupBy('bibliotecas.id')
                            ->get();
            return [
                'error' => false,
                'bibliotecas' => $bibliotecas
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'bibliotecas' => $th->errorInfo
            ];
        }
    }
}
