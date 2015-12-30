<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //
    protected $table = 'pets';
    protected $fillable = array('name'
                                , 'client_id'
                                , 'sex'
                                , 'birth_date'
                                , 'species_id') ;
}
