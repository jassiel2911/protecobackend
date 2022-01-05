<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Ficha extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\Ticket');
    }

     protected $fillable = ['ticket_id'];
}
