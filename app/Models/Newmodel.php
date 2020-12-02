<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newmodel extends Model
{
    use HasFactory;
    public $table='user_registration';
    public $timestamps=false;
}
?>