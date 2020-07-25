<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
