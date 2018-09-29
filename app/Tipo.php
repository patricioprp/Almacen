<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['descripcion'];


    public function productos(){
        //relacion uno a muchos
        return $this->hasMany('\App\Producto'); 
      }
      public function getShowAttribute(){
        return $this->descripcion;
     }
}
