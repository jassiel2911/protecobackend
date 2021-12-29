<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Ticket;


class TicketItem extends Model
{
    use HasFactory;

     public function curso(){
        return $this->belongsTo('App\Models\Curso');
    }

     public function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }
}
