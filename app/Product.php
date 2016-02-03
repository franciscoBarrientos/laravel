<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name'
        ,'product_type_id'
        ,'provider_id'
        ,'quantity'
        ,'price'
        ,'stock_alert'
    ];

    protected $dates = ['deleted_at'];

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
