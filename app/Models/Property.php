<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function property_image(){
        return $this->hasMany(PropertyImage::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function area() {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function type() {
        return $this->belongsTo(PropertyCategory::class, 'cat_id');
    }

    public function sub_type() {
        return $this->belongsTo(PropertySubCategory::class, 'sub_cat_id');
    }

    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class);
    }

    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'property_interests', 'property_id', 'user_id')
                    ->withPivot('created_at') // Get the timestamp of interest
                    ->withTimestamps();
    }

}
