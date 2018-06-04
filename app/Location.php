<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['name','province_id'];
    public static function locations($id){
      return Location::where('province_id','=',$id)
      ->get();
    }
}
