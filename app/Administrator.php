<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrators';

    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id'];
}
