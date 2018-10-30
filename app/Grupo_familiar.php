<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_familiar extends Model
{
    protected $table = 'grupo_familiars';
    protected $fillable = ['id','nombre','apellido','dni','f_nac','type','user_id'];

    public function user() {
        return $this->belongsTo('App\User');
      }
}
