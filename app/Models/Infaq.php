<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infaq extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'description',
    ];

    public function getImageUrlAttribute()
    {
        return '/images/infaq/'.$this->image;
    }

    public function scopeNameFirst($query)
    {
        return $query->orderBy('name', 'ASC');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function getTotalPaidAttribute()
    { 
        return $this->payments()->where('status', 1)->sum('amount');
    }

    public function getTotalPaidFormattedAttribute()
    { 
        return 'Rp '.number_format($this->payments()->where('status', 1)->sum('amount'));
    }
}
