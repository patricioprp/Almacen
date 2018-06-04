<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['name','state_id'];
    public static function provinces($id){
      return Province::where('state_id','=',$id)
      ->get();
    }
}
