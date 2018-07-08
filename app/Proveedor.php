<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedors';
    protected $fillable = ['id', 'nombre', 'telefono','domicilio_id'];

    public function domicilio() {
        return $this->belongsTo('App\Domicilio');
      }
      public function compras(){
        //relacion uno a muchos
        return $this->hasMany('\App\Compra'); 
      }
    
}
