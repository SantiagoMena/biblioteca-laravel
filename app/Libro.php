<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

}
