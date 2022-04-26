<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\User;

class Curso extends Model
{
    use HasFactory;

    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
