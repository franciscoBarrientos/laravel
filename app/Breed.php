<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    //
    protected $table = 'breeds';

    protected $fillable = array('name'
    , 'species_id') ;
}
