<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['name'
                          ,'lastname'
                          ,'rut'
                          ,'address'
                          ,'cellphone'
                          ,'phone'
                          ,'email'];
}
