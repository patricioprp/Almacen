<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['cantidad','minimo'];


    public function productos(){
        //relacion uno a muchos
        return $this->hasMany('\App\Producto'); 
      }
}
