<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
        'description'
    ];

    public function scopeSearch($query, $description){
        return $query -> where('description', 'LIKE', "%$description%");
    }
}
