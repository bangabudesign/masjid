<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'whatsapp',
        'job_title',
        'status',
    ];

    public const INACTIVE = 0;
    public const ACTIVE = 1;

    public const STATUSES = [
        self::INACTIVE => 'INACTIVE',
        self::ACTIVE => 'ACTIVE',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }

    public function getStatusFormattedAttribute()
    { 
        switch ($this->status) {
            case self::ACTIVE:
                return '<span class="badge badge-success">AKTIF</span>';
                break;
            default:
                return '<span class="badge badge-warning">OFF</span>';
                break;
        }
    }

    public function getImageUrlAttribute()
    {
        return '/images/supports/'.$this->image;
    }
}
