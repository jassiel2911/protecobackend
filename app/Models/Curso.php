<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Curso extends Model
{
    use HasFactory;

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
