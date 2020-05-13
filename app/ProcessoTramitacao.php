<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessoTramitacao extends Model
{
    protected $fillable = 
    [
        'fk_processo', 'fk_setor','fk_user','status'
    ]; 

    public function processo()
    {
        return $this->belongsTo(Processo::class, 'fk_processo');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'fk_setor');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
}
