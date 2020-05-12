<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoAssinatura extends Model
{
    protected $fillable = 
    [
        'fk_processo_documento','fk_user','dispositivo','ip','status'
    ]; 

    public function processo_documento()
    {
        return $this->belongsTo(ProcessoDocumento::class, 'fk_processo_documento');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
}
