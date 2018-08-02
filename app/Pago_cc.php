<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago_cc extends Model
{
    protected $table = 'pago_ccs';
    protected $fillable = ['id','monto','fecha','cliente_id'];

    public function venta(){
        return $this->belongsTo('\App\Venta');
    }
    public function linea_pago(){
        return $this->belongsTo('\App\Venta');
    }
}
