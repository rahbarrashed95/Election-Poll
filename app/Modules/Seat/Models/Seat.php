<?php

namespace App\Modules\Seat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    CONST ACTIVE = 1;
    CONST INACTIVE = 2;
    protected $guarded = [];
}
