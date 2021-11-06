<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'username',
        'category',
        'about',
        'address',
        'city',
        'website',
        'instagram',
        'whatsapp',
        'verified_at',
        'status',
        'user_id',
    ];

    public $casts = [
        'verified_at' => 'datetime:d, M Y H:i:s',
    ];

    public const REVIEW = 0;
    public const ACTIVE = 1;

    public const STATUSES = [
        self::REVIEW => 'REVIEW',
        self::ACTIVE => 'ACTIVE',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getVerifiedAtFormattedAttribute()
    { 
        return date("d, M Y H:i",strtotime($this->verified_at));
    }

    public function getLogoUrlAttribute()
    {
        return '/images/vendors/'.$this->logo;
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('verified_at', 'DESC');
    }

    public function scopeVerifiedVendor($query)
    {
        return $query->where('status', self::ACTIVE)
            ->where('verified_at', '<=', Carbon::now());
    }

    public function getStatusFormattedAttribute()
    { 
        switch ($this->status) {
            case self::ACTIVE:
                return '<span class="badge badge-success">AKTIF</span>';
                break;
            default:
                return '<span class="badge badge-warning">REVIEW</span>';
                break;
        }
    }
}
