<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $table = 'clients';
    protected $fillable = ['name'
                          ,'lastname'
                          ,'rut'
                          ,'address'
                          ,'cellphone'
                          ,'phone'
                          ,'email'];
    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $name){
        return $query -> where('name', 'LIKE', "%$name%");
    }

}
