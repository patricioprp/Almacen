<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta_corriente extends Model
{
    protected $table = 'cuenta_corrientes';
    protected $fillable = ['id','monto','fecha','estado','venta_id','cliente_id'];

    public function venta(){
        return $this->belongsTo('\App\Venta');
    }
    public function cliente() {
        return $this->belongsTo('App\Cliente');
      }
}
