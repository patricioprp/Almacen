<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'conceptos';
    protected $fillable = ['descripcion','tipo','importe'];

    public function detalleLiquidacion(){
        //relacion uno a muchos
        return $this->hasMany('\App\Detalleliquidacion'); 
      }
      public function getFullAttribute(){
        return $this->descripcion.'-'.$this->tipo.'-'.$this->importe;
     }
}
