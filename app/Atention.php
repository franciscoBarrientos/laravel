<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Atention extends Model
{
    //
    protected $table = 'atentions';
    protected $fillable = ['description'
        ,'pet_id'];
}
