<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    protected $fillable = 
    [
        'titulo', 'sigla','status'
    ]; 
}
