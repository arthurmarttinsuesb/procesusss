<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['id','nome','fk_estado'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'fk_estado');
    }
}
