<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadmodel extends Model
{
    use HasFactory;
    public $table='image_table';
    public $timestamps=false;
}
