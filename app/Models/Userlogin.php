<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlogin extends Model
{
    use HasFactory;
    protected $table='userdatas';
    protected $primaryKey='id';
}
