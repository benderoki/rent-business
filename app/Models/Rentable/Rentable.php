<?php

namespace App\Models\Rentable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rentable extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(RentableTariff::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(RentableItem::class);
    }
}
