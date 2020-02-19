<?php

namespace App\Models\Rentable;

use Illuminate\Database\Eloquent\Model;

class RentableTariffRate extends Model
{
    protected $fillable = [
        'period',
        'price',
    ];

    public function getFromPeriodAttribute()
    {
        return str_replace(
            '[',
            '',
            explode(',', $this->attributes['period'])[0]
        );
    }

    public function getToPeriodAttribute()
    {
        return str_replace(
            ')',
            '',
            explode(',', $this->attributes['period'])[1]
        );
    }
}
