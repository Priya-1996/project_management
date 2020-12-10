<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customermodel extends Model
{
    use HasFactory;
    public $table='restaurant_owner';
    public $timestamps=false;
}
