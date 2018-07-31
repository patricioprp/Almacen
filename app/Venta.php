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
}
