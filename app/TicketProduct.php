<?php

namespace Veterinaria;

use Illuminate\Database\Eloquent\Model;

class TicketProduct extends Model
{
    protected $table = 'ticket_products';
    protected $fillable = [
        'ticket_id'
        ,'description'
        ,'quantity'
        ,'price'
        ,'subtotal'
    ];

    public function scopeSearchByTicketId($query, $id)
    {
        return $query->where('ticket_id', '=', $id);
    }
}
