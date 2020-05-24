<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;

class ProcessoDocumento extends Model
{
    use HasSlug;
    
    protected $fillable = 
    [
        'fk_processo','fk_user','fk_modelo_documento','titulo','slug','descricao','conteudo','status'
    ]; 

    public function processo()
    {
        return $this->belongsTo(Processo::class, 'fk_processo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }

    public function modelo_documento()
    {
        return $this->belongsTo(ModeloDocumento::class, 'fk_modelo_documento');
    }

     //toda vez que eu criar um titulo ele irá gerar um slug automaticamente.
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
}
