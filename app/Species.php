<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $table = 'species';
    protected $fillable = array('species') ;

    public function pets()
    {
        return $this->hasMany('Veterinaria\Pet');
    }

    public function scopeSearch($query, $species){
        return $query -> where('species', 'LIKE', "%$species%");
    }
}
