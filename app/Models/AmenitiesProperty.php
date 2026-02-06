<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitiesProperty extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    function Category() {
        return $this->belongsTo(PropertyCategory::class);
    }
    
}
