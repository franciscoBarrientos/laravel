<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrators';

    protected $fillable = ['user_id'];

    public static function administrator($id){
        return Administrator::where('user_id','=',$id)->get();
    }
}