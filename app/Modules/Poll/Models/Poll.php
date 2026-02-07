<?php

namespace App\Modules\Poll\Models;

use App\Modules\Candidate\Models\Candidate;
use App\Modules\Pollers\Models\Pollers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function poller()
    {
        return $this->belongsTo(Pollers::class);
    }

}
