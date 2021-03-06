<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table='users';
      protected $fillable = [
        'name', 'email', 'password','apellido','dni','turno','telefono','type','fechaAlta','domicilio_id'
    ];
      public function domicilio() {
        return $this->belongsTo('App\Domicilio');
      }
      public function liquidacions(){
        return $this->hasMany('\App\Liquidacion');
       }
       public function grupo_familiars(){
        return $this->hasMany('\App\Grupo_familiar');
       }
       public function ventas(){
        //relacion uno a muchos
        return $this->hasMany('\App\Venta'); 
      }
      public function compras(){
        //relacion uno a muchos
        return $this->hasMany('\App\Compra'); 
      }

      public function scopeSearch($query, $apellido ){
        return $query->where('apellido', 'LIKE', "%$apellido%");
     }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
        protected $hidden = [
        'password', 'remember_token',
    ];
}
