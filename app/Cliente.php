<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre','apellido','estado','dni','telefono','domicilio_id'];

    public function domicilio() {
        return $this->belongsTo('App\Domicilio');
        //return $this->hasOne('App\Profile', 'clave_foranea', 'clave_local_a_relacionar');
      }
}
