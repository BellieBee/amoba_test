<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Track extends Model
{
    use HasFactory;

    protected $table = 'tracks';

    protected $fillable = [
        'name',
        'status'
    ];

    public function service() : HasOne
    {
        return $this->hasOne(Service::class);
    }

    public function track() : HasOne {
        return $this->hasOne(Track::class);
    }
}
