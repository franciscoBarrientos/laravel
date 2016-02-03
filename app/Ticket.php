<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'number'
        ,'canceled'
        ,'paid'
    ];
}
