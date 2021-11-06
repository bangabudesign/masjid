<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'customer_name',
        'customer_agency',
        'customer_email',
        'customer_phone',
        'event_name',
        'start_at',
        'end_at',
        'daily_booking_rate',
        'hourly_booking_rate',
        'daily_booking_count',
        'hourly_booking_count',
        'notes',
        'status',
        'user_id',
        'spot_id',
    ];

    public const CANCEL = -1;
    public const WAITING = 0;
    public const BOOKED = 1;

    public const STATUSES = [
        self::CANCEL => 'CANCEL',
        self::WAITING => 'WAITING',
        self::BOOKED => 'BOOKED',
    ];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function getTotalPaidAttribute()
    { 
        return $this->payments()->where('status', 1)->sum('amount');
    }

    public function getTotalUnpaidAttribute()
    { 
        return (($this->daily_booking_rate * $this->daily_booking_count) + ($this->hourly_booking_rate * $this->hourly_booking_count) + $this->bookig_charge) - $this->payments()->where('status', 1)->sum('amount');
    }

    public function getTotalFormattedAttribute()
    { 
        return number_format(($this->daily_booking_rate * $this->daily_booking_count) + ($this->hourly_booking_rate * $this->hourly_booking_count) + $this->bookig_charge);
    }

    public function getStatusFormattedAttribute()
    { 
        switch ($this->status) {
            case self::CANCEL:
                return '<span class="badge badge-danger">CANCEL</span>';
                break;
            case self::BOOKED:
                return '<span class="badge badge-success">BOOKED</span>';
                break;
            default:
                return '<span class="badge badge-warning">WAITING</span>';
                break;
        }
    }
}
