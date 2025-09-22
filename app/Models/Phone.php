<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    /**
     * Get the Student that owns the phone.
     */
    public function studentRelation(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
