<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = ['name'];
    
    public function provinces(){
        //relacion uno a muchos
        return $this->hasMany('\App\Province'); 
      }
}
