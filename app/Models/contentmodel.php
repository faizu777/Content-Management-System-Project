<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contentmodel extends Model
{
    use HasFactory;
    protected $table='contents';
    protected $primaryKey='id';
}
