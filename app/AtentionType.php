<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtentionType extends Model
{
    use SoftDeletes;
    protected $table = 'atentions_type';
    protected $fillable = ['description','price'];
    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $description){
        return $query -> where('description', 'LIKE', "%$description%");
    }
}