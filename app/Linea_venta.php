<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_venta extends Model
{
    protected $table = 'linea_ventas';
    protected $fillable = ['id','venta_id','producto_id'.'cantidad'];

    public function venta(){
        return $this->belongsTo('\App\Venta');
    }
    public function producto() {
        return $this->belongsTo('App\Producto');
      }  
}
