<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hobby extends Model
{
    /**
     * Get the student that owns the hobby.
     */
    public function studentRelation(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
