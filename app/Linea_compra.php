<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_compra extends Model
{
    protected $table = 'compra_producto';
    protected $fillable = ['id','subTotal','compra_id','producto_id','cantidad'];

    public function producto(){
        return $this->belongsTo('\App\Producto');
      }
      public function compra(){
        return $this->belongsTo('\App\Compra');
      }
}
