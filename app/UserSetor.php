<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetor extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'fk_setor');
    }
}
