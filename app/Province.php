<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['name','state_id'];

      //En este caso la funcion va en singular porque es el otro sentido de la relacion de uno a muchos
    public function state(){
          return $this->belongsTo('\App\State');
        }

    public function locations(){
      //relacion uno a muchos
      return $this->hasMany('\App\Location'); 
    }


    public static function provinces($id){
      return Province::where('state_id','=',$id)
      ->get();
    }
}
