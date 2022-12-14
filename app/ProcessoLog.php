<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessoLog extends Model
{
    protected $fillable = 
    [
        'fk_processo','fk_user','justificativa','status'
    ]; 

    public function processo()
    {
        return $this->belongsTo(Processo::class, 'fk_processo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
}
