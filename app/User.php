<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = 
    [
        'nome', 'tipo','sexo','nascimento','telefone','cpf_cnpj','logradouro','numero','bairro',
        'cep','complemento','fk_cidade','fk_estado' ,'email','status'
    ]; 

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'fk_cidade');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'fk_estado');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
