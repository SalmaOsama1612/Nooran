<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchievementImage extends Model
{
    protected $fillable = [
        'achievement_id',
        'image'
    ];
}