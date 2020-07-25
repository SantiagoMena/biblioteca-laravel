<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
