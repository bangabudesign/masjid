<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'body',
        'price',
        'is_active',
        'image'
    ];

    public const NONACTIVE = 0;
    public const ACTIVE = 1;

    public const STATUSES = [
        self::NONACTIVE => 'NONACTIVE',
        self::ACTIVE => 'ACTIVE',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeActiveProduct($query)
    {
        return $query->where('is_active', self::ACTIVE);
    }

    public function getImageUrlAttribute()
    { 
        return '/images/products/'.$this->image;
    }

    public function getStatusFormattedAttribute()
    { 
        switch ($this->is_active) {
            case self::ACTIVE:
                return '<span class="badge badge-success">AKTIF</span>';
                break;
            default:
                return '<span class="badge badge-warning">NONAKTIF</span>';
                break;
        }
    }
}
