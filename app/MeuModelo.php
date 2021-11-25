<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeuModelo extends Model
{
    use HasSlug;
    use SoftDeletes;

    protected $fillable = 
    [
        'titulo','slug','conteudo','fk_user','status','compartilhar_setor','compartilhar_geral'
    ]; 

    //toda vez que eu criar um título ele irá gerar um slug automáticamente.
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug');
    }

     //estou substituindo o id como identificação padrão para o slug
     public function getRouteKeyName()
     {
         return 'slug';
     }

     public function user()
     {
         return $this->belongsTo(User::class, 'fk_user');
     }
}
