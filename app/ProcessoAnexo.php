<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessoAnexo extends Model
{
    protected $fillable =
    [
        'fk_processo', 'fk_user', 'titulo', 'arquivo','tipo', 'status'
    ];

    public function processo()
    {
        return $this->belongsTo(Processo::class, 'fk_processo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }

    public function userAthenticated()
    {
        return $this->belongsTo(User::class, 'fk_user_atenticacao');
    }
}
