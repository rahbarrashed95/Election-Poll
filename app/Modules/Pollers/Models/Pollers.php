<?php

namespace App\Modules\Pollers\Models;

use App\Modules\Poll\Models\Poll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pollers extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function poll()
    {
        return $this->hasOne(Poll::class);
    }


}
