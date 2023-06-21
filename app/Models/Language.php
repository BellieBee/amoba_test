<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = [
        'name'
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'language_id', 'id');
    }

    public function userPlan() : HasMany
    {
        return $this->hasMany(UserPlan::class, 'language_id', 'id');
    }
}
