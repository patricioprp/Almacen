<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['name','province_id'];

    public function domicilios(){
      //relacion uno a muchos
      return $this->hasMany('\App\Domicilio'); 
    }

      //En este caso la funcion va en singular porque es el otro sentido de la relacion de uno a muchos
      public function province(){
        return $this->belongsTo('\App\Province');
      }

    public static function locations($id){
      return Location::where('province_id','=',$id)
      ->get();
    }
}
