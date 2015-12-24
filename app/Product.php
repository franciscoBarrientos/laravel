<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name'
        ,'product_type_id'
        ,'provider_id'
        ,'quantity'
        ,'price'
    ];
}
