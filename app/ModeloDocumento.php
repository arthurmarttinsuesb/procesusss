<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloDocumento extends Model
{
    protected $fillable = 
    [
        'titulo','conteudo','status'
    ]; 
}
