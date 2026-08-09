<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'intro',
        'vision',
        'mission',
        'values',
        'strategic_axes',
        'strategic_goals',
        'image',
    ];
}