<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'organization_description',
        'title',
        'start_date',
        'current_volunteers',
        'max_volunteers',
        'external_url',
        'logo',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'is_active' => 'boolean',
        'current_volunteers' => 'integer',
        'max_volunteers' => 'integer',
    ];
}
