<?php

namespace App\Models\Rentable;

use Illuminate\Database\Eloquent\Model;

class RentableTariff extends Model
{
    public const MINUTLY_PERIOD_TYPE = 'minutly';
    public const HOURLY_PERIOD_TYPE = 'hourly';
    public const DAILY_PERIOD_TYPE = 'daily';
    public const MONTHLY_PERIOD_TYPE = 'monthly';

    public const PERIOD_TYPES = [
        self::MINUTLY_PERIOD_TYPE,
        self::HOURLY_PERIOD_TYPE,
        self::DAILY_PERIOD_TYPE,
        self::MONTHLY_PERIOD_TYPE,
    ];

    public const EVERY_PERIOD_TIME_BILL_TYPE = 'every_period_time';
    public const ONCE_PER_PERIOD_BILL_TYPE = 'once_per_period';

    public const BILL_TYPES = [
        self::EVERY_PERIOD_TIME_BILL_TYPE,
        self::ONCE_PER_PERIOD_BILL_TYPE,
    ];

    protected $fillable = [
        'period_type',
        'bill_type',
    ];

    public function rates()
    {
        return $this->hasMany(RentableTariffRate::class);
    }
}
