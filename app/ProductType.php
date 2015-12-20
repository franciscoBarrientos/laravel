<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
        'description'
    ];
}
