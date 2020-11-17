<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable =
    [
        'fk_user_remetente','fk_user', 'numero', 'status'
    ];

    public function user_remetente()
    {
        return $this->belongsTo(User::class, 'fk_user_remetente');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }

    public function documentos()
    {
        return $this->hasMany(ProcessoDocumento::class, 'fk_processo');
    }
}