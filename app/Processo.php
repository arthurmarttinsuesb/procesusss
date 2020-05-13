<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = 
    [
        'fk_user','numero','status'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
}
