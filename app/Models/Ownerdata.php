<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ownerdata extends Model
{
	protected $guarded = [];
    use HasFactory;
    public $table='owner_data';
    public $timestamps=false;
}
