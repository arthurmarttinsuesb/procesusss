<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable =
    [
        'titulo', 'sigla', 'status', 'fk_secretaria', 'email'
    ];

    public function secretaria()
    {
        return $this->belongsTo('App\Secretaria', 'fk_secretaria');
    }
}
