<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = 'domicilios';
    protected $fillable = ['calle','barrio','numero','location_id'];

      //En este caso la funcion va en singular porque es el otro sentido de la relacion de uno a muchos
      public function location(){
        return $this->belongsTo('\App\Location');
      }

      
      public function cliente(){
        return $this->hasOne('\App\Cliente');
       }
       public function user(){
        return $this->hasOne('\App\User');
       }
}
