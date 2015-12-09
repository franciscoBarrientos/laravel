<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //
    protected $table = 'pets';
    protected $fillable = array('pet_name'
                                , 'pet_age'
                                , 'client_id') ;
}
