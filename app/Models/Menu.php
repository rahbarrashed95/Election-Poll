<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relationship to the page associated with the menu
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // Relationship to get the parent menu (if it exists)
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    // Relationship to get all submenus associated with this menu
    public function submenus()
    {
        return $this->hasMany(SubMenu::class, 'page_id');
    }
}
