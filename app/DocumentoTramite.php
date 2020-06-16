<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoTramite extends Model
{
    protected $fillable = 
    [
        'fk_processo_documento','fk_user','fk_setor','assinatura','leitura','status'
    ]; 

    public function processo_documento()
    {
        return $this->belongsTo(ProcessoDocumento::class, 'fk_processo_documento');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
    public function setor()
    {
        return $this->belongsTo(Setor::class, 'fk_setor');
    }
}
