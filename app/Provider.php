<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    protected $fillable = [
         'fancy_name'
        ,'business_name'
        ,'activity'
        ,'rut'
        ,'verifying_digit'
        ,'name'
        ,'email'
        ,'phone'
    ];

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }
}
