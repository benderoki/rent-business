<?php

namespace App\Models;

use App\BookingCostCalculation\BookingCostCalculator;
use App\Models\Rentable\RentableItem;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public const WAITING_STATUS = 'waiting';
    public const STARTED_STATUS = 'started';
    public const COMPLETED_STATUS = 'completed';
    public const CANCELED_STATUS = 'canceled';

    public const STATUSES = [
        self::WAITING_STATUS,
        self::STARTED_STATUS,
        self::COMPLETED_STATUS,
        self::CANCELED_STATUS,
    ];

    protected $attributes = [
        'status' => self::WAITING_STATUS,
        'cost' => 0,
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function rentableItem()
    {
        return $this->belongsTo(RentableItem::class);
    }

    public function startable()
    {
        return $this->status == self::WAITING_STATUS;
    }

    public function completable()
    {
        return $this->status == self::STARTED_STATUS;
    }

    public function cancelable()
    {
        return $this->status == self::WAITING_STATUS;
    }

    public function getActualCostAttribute()
    {
        return (new BookingCostCalculator())->cost($this);
    }
}
