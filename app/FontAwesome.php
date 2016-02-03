<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class FontAwesome extends Model
{
    protected $table = 'font_awesome';

    protected $fillable = array('font', 'code') ;

    public static function getFontAwesobeByCode($code){
        return Breed::where('code','=',$code)->get();
    }

    public static function getFontAwesobeByFont($font){
        return Breed::where('font','=',$font)->get();
    }
}
