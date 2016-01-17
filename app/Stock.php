<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = [
        'invoice_number'
        ,'quantity'
        ,'product_id'
        ,'record_type_stock_id'
    ];
}