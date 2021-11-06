<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spot extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'daily_booking_rate',
        'hourly_booking_rate',
        'capacity',
        'is_active',
        'image'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getImageUrlAttribute()
    { 
        return '/images/spots/'.$this->image;
    }
}
