<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['precio_costo','precio_venta','descripcion','stock_id','tipo_id'];

      //En este caso la funcion va en singular porque es el otro sentido de la relacion de uno a muchos
    public function tipo(){
          return $this->belongsTo('\App\Tipo');
        }
    public function stock(){
            return $this->belongsTo('\App\Stock');
        }
    public function compra(){
          return $this->belongsToMany('App\Compra');
        }
    public function lineaVenta(){
          return $this->hasOne('\App\Linea_venta');
        }
    public function lineaCompra(){
          //relacion uno a muchos
          return $this->hasMany('\App\Linea_compra'); 
        }
    public function getFullAttribute(){
          return $this->descripcion.'-'.'$'.$this->precio_costo;
       }
       public function getVentaAttribute(){
        return $this->descripcion.'-'.'$'.$this->precio_venta;
     }
       public function scopeSearch($query, $descripcion ){
        return $query->where('descripcion', 'LIKE', "%$descripcion%");
     }
}
