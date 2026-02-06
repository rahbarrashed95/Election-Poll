<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id'); 
    }

    public function parentPage()
    {
        return $this->belongsTo(Page::class,'parent_id'); 
    }
}
