<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VolunteerApplication extends Model
{
    protected $fillable = [
        'volunteer_opportunity_id',
        'name',
        'phone',
        'email',
        'gender',
        'notes',
        'status',
    ];

    public function opportunity(): BelongsTo
    {
        return $this->belongsTo(VolunteerOpportunity::class);
    }
}