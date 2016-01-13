<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class AtentionProduct extends Model
{
    //
    protected $table = 'atention_product';
    protected $fillable = ['product_id'
        ,'product_id'
        ,'product_quantity'
        ,'atention_id'];
}
