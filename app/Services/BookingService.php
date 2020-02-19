<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;

class BookingService
{
    public $booking;

    public function __construct(Booking $booking = null)
    {
        $this->booking = $booking;
    }

    public function create(array $data)
    {
        $booking = new Booking();
        $booking->deposit = $data['deposit'];
        $booking->client()->associate($data['client_id']);
        $booking->rentableItem()->associate($data['rentable_item_id']);
        $booking->save();

        return $booking;
    }

    public function start(Carbon $date)
    {
        $this->booking->start_date = $date;
        $this->booking->status = Booking::STARTED_STATUS;
        $this->booking->save();
    }

    public function complete(Carbon $date)
    {
        $this->booking->end_date = $date;
        $this->booking->status = Booking::COMPLETED_STATUS;
        $this->booking->save();
    }

    public function cancel()
    {
        $this->booking->status = Booking::CANCELED_STATUS;
        $this->booking->save();
    }
}
