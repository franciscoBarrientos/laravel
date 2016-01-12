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

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }

    public function scopeSearchById($query, $id)
    {
        return $query->where('id', '=', "$id");
    }

    public function scopeAvailable($query)
    {
        return $query->where('quantity', '>', 0);
    }
}
