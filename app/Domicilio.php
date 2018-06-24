<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = 'domicilios';
    protected $fillable = ['calle','barrio','numero','location_id'];
}
