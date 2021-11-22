<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'body',
        'image',
        'event_date',
        'status',
    ];

    public const DRAFT = 0;
    public const PUBLISH = 1;

    public const STATUSES = [
        self::DRAFT => 'DRAFT',
        self::PUBLISH => 'PUBLISH',
    ];

    public $casts = [
        'event_date' => 'datetime:d, M Y H:i:s',
    ];

    public function getImageUrlAttribute()
    {
        return '/images/events/'.$this->image;
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('event_date', 'DESC');
    }

    public function scopeUpcomingEvent($query)
    {
        return $query->orderBy('event_date', 'ASC')
                ->where('event_date', '>=', now());
    }

    public function scopeActiveEvent($query)
    {
        return $query->where('status', self::PUBLISH);
    }

    public function getNextEventAttribute()
    {
        $nextPost = self::activeEvent()
            ->where('event_date', '>', $this->event_date)
            ->orderBy('event_date', 'asc')
            ->first();

        return $nextPost;
    }

    public function getPrevEventAttribute()
    {
        $prevPost = self::activeEvent()
            ->where('event_date', '<', $this->event_date)
            ->orderBy('event_date', 'desc')
            ->first();

        return $prevPost;
    }

    public function getStatusFormattedAttribute()
    { 
        switch ($this->status) {
            case self::PUBLISH:
                return '<span class="badge badge-success">PUBLISH</span>';
                break;
            default:
                return '<span class="badge badge-warning">DRAFT</span>';
                break;
        }
    }
}
