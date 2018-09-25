<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compras';
    protected $fillable = ['id', 'fecha', 'monto','user_id','proveedor_id'];

    public function proveedor(){
        return $this->belongsTo('\App\Proveedor');
      }
    /*public function producto() {
        return $this->belongsTo('App\Producto');
      }*/
    public function productos(){
        //relacion uno a muchos
        return $this->belongsToMany('\App\Producto'); 
      }
      public function user(){
        return $this->belongsTo('\App\User');
      }
}
