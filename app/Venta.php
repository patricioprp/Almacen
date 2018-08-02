<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $fillable = ['id','monto','fecha','user_id','cliente_id'];


    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function cliente(){
        return $this->belongsTo('\App\Cliente');
    }
    public function lineaVentas(){
        return $this->hasMany('\App\Linea_venta');
      }
    public function cuentasCorrientes(){
        return $this->hasMany('\App\Cuenta_corriente');
      }
    public function pago() {
        return $this->belongsTo('App\Pago');
      }
      public function pago_cc(){
        return $this->hasMany('\App\Pago_cc');
      } 
}
