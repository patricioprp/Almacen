<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = ['id','monto','fecha','cliente_id'];

    public function venta(){
        return $this->hasOne('\App\Venta');
      }
}
