<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'job_title',
        'position',
        'body',
    ];

    public function getImageUrlAttribute()
    {
        return '/images/teams/'.$this->image;
    }
}
