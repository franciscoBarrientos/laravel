<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';
    protected $fillable = array('client_name'
                                , 'client_last_name_p'
                                , 'client_last_name_m'
                                , 'client_rut'
                                , 'client_direction'
                                , 'client_cellphone'
                                , 'client_phone');
}
