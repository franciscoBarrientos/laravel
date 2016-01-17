<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class RecordTypeStock extends Model
{
    protected $table = 'record_type_stocks';
    protected $fillable = [
        'description'
    ];
}
