<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Veterinaria\User;

class Administrator extends Model
{
    protected $table = 'administrators';

    protected $fillable = ['user_id'];

    public static function administrator($id){
        return Administrator::where('user_id','=',$id)->get();
    }

    public function scopeSearch($query, $name)
    {
        return $query->join('users', 'users.id', '=', 'administrators.user_id')
        ->where('users.name', 'like', '%'.$name.'%');
    }
}