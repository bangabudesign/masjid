<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'method',
        'amount',
        'notes',
        'status',
        'receipt',
        'confirm_at',
        'user_id',
        'paymentable_id',
        'paymentable_type',
    ];

    public const CANCEL = -1;
    public const WAITING = 0;
    public const PAID = 1;

    public const STATUSES = [
        self::CANCEL => 'CANCEL',
        self::WAITING => 'WAITING',
        self::PAID => 'PAID',
    ];
    
    protected $casts = [
        'confirm_at' => 'datetime',
    ];

    public function getStatusFormattedAttribute()
    { 
        switch ($this->status) {
            case self::CANCEL:
                return '<span class="badge badge-danger">CANCEL</span>';
                break;
            case self::PAID:
                return '<span class="badge badge-success">PAID</span>';
                break;
            default:
                return '<span class="badge badge-warning">WAITING</span>';
                break;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentable()
    {
        return $this->morphTo();
    }

    public function getAmountFormattedAttribute()
    {
        return number_format($this->amount);
    }

    public function getReceiptUrlAttribute()
    { 
        return '/images/payments/'.$this->receipt;
    }
}
