<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
    protected $fillable = [
        'name',
        'degree',
        'position',
        'phone',
        'email',
        'image',
    ];
}