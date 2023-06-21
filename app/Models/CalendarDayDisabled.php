<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarDayDisabled extends Model
{
    use HasFactory;

    protected $table = 'calendar_days_disabled';

    protected $fillable = [
        'calendar_id',
        'day',
        'enabled'
    ];

    public function calendar() : BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }
}
