<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlertType extends Model
{
    use SoftDeletes;

    protected $table = 'alerts_type';

    protected $fillable = ['title','font_awesome_id','color'];
}
