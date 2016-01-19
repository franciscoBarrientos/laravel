<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;
    protected $table = 'pets';
    protected $fillable = array('name'
                                , 'client_id'
                                , 'sex'
                                , 'birth_date'
                                , 'breed_id') ;
    protected $dates = ['deleted_at'];
}
