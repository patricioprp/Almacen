<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    protected $table = 'liquidacions';
    protected $fillable = ['sueldoNeto','periodo','desde','hasta','estado','user_id'];
    
    public function detalleLiquidacion(){
        //relacion uno a muchos
        return $this->hasMany('\App\Detalleliquidacion'); 
      }
      public function user() {
        return $this->belongsTo('App\User');
      }
}
