<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleliquidacion extends Model
{
    protected $table = 'detalle_liquidacions';
    protected $fillable = ['unidad','subTotalH','subTotalD','liquidacion_id','concepto_id'];

    public function concepto(){
        return $this->belongsTo('\App\Concepto');
      }
      public function liquidacion(){
        return $this->belongsTo('\App\Liquidacion');
      }
}
