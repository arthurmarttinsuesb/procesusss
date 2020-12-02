<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevolutivaDocumento extends Model
{
    protected $fillable = 
    [
        'fk_tramite_documento','fk_user','fk_setor','observacao'
    ]; 

    public function processo_documento()
    {
        return $this->belongsTo(DocumentoTramite::class, 'fk_tramite_documento');
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
