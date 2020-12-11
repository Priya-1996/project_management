<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisinemodel extends Model
{
    use HasFactory;
    public $table='cuisine';
    public $timestamps=false;
}
