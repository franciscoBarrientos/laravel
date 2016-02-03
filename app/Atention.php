<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class Atention extends Model
{
    protected $table = 'atentions';
    protected $fillable = [ 'pet_id'
                            ,'atentions_type_id'
                            ,'procedure'
                            ,'treatment'
                            ,'diagnosis'
                            ,'prescription'
                            ,'ticket_id'
                          ];

    public static function getAtentionsByPetId($id){
        return Atention::where('pet_id','=',$id);
    }
}
