<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'conceptos';
    protected $fillable = ['descripcion','tipo','montoFijo','montoVariable'];

    public function detalleLiquidacion(){
        //relacion uno a muchos
        return $this->hasMany('\App\Detalleliquidacion'); 
      }
}
