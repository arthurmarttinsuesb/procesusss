<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasSlug;

    protected $guard_name = 'web';

    protected $fillable = 
    [
        'nome', 'tipo','sexo','nascimento','telefone','cpf_cnpj','logradouro','numero','bairro',
        'cep','complemento','fk_cidade','fk_estado' ,'email','status'
    ]; 

     //toda vez que eu criar um nome ele irá gerar um slug automáticamente.
     public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('nome')
             ->saveSlugsTo('slug');
     }

       //estou substituindo o id como identificação padrão para o slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'fk_cidade');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'fk_estado');
    }

    public function file()
    {
        return $this->hasOne(File::class, 'fk_user');
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
