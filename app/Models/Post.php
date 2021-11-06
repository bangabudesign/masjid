<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'published_at',
        'status',
        'user_id',
    ];

    public const DRAFT = 0;
    public const PUBLISH = 1;

    public const STATUSES = [
        self::DRAFT => 'DRAFT',
        self::PUBLISH => 'PUBLISH',
    ];

    public $casts = [
        'published_at' => 'datetime:d, M Y H:i:s',
    ];

    public function getPublishedAtFormattedAttribute()
    { 
        return date("d, M Y H:i",strtotime($this->published_at));
    }

    public function getImageUrlAttribute()
    {
        return '/images/posts/'.$this->image;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'DESC');
    }

    public function scopeActivePost($query)
    {
        return $query->where('status', self::PUBLISH)
            ->where('published_at', '<=', Carbon::now());
    }

    public function getNextPostAttribute()
    {
        $nextPost = self::activePost()
            ->where('published_at', '>', $this->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        return $nextPost;
    }

    public function getPrevPostAttribute()
    {
        $prevPost = self::activePost()
            ->where('published_at', '<', $this->published_at)
            ->orderBy('published_at', 'desc')
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
