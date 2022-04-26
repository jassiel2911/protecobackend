<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ficha;
use App\Models\TicketItem;


class Ticket extends Model
{
    use HasFactory;

    public function ticketitems(){
        return $this->hasMany('App\Models\TicketItem');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function ficha(){
        return $this->hasMany('App\Models\Ficha');
    }
    
}
