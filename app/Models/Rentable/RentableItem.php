<?php

namespace App\Models\Rentable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentableItem extends Model
{
    protected $fillable = [
        'name',
        'identification_number',
    ];

    public function rentable(): BelongsTo
    {
        return $this->belongsTo(Rentable::class);
    }
}
