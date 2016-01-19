<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtentionType extends Model
{
    use SoftDeletes;
    protected $table = 'atention_type';
    protected $fillable = ['description'];
    protected $dates = ['deleted_at'];
}