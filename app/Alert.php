<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alert extends Model
{
    use SoftDeletes;

    protected $table = 'alerts';

    protected $fillable = [
        'alerts_type_id',
        'pets_id',
        'description',
        'date'
    ];

    public static function getAlertsByPetId($petId){
        return Alert::where('pets_id','=',$petId);
    }
}
