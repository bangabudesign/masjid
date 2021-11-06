<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialStatement extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'recording_at',
        'income',
        'outcome',
        'body',
        'user_id',
    ];

    public $casts = [
        'recording_at' => 'datetime:d, M Y H:i:s',
    ];

    public function scopeSisaSaldo($query)
    {
        $totalIncome = $query->sum('income');
        $totalOutcome = $query->sum('outcome');

        return $totalIncome - $totalOutcome;
    }

    public function scopeTotalIncome($query)
    {
        return $query->sum('income');
    }

    public function scopeTotalOutcome($query)
    {
        return $query->sum('outcome');
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('recording_at', 'DESC');
    }

    public function scopeOldestFirst($query)
    {
        return $query->orderBy('recording_at', 'ASC');
    }

    public function getNextDataAttribute()
    {
        $nextData = self::where('recording_at', '>', $this->recording_at)
            ->orderBy('recording_at', 'asc')
            ->first();

        return $nextData;
    }

    public function getPrevDataAttribute()
    {
        $prevData = self::where('recording_at', '<', $this->recording_at)
            ->orderBy('recording_at', 'desc')
            ->first();

        return $prevData;
    }
}
