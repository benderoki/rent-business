<?php

namespace App\BookingCostCalculation;

use App\Models\Booking;

class BookingCostCalculator
{
    public function cost(Booking $booking)
    {
        $tariff = $booking->rentableItem->rentable->tariff;

        if ($booking->start_date == null) {
            return '';
        }
        $cost = 0;

        $minutesDiff = now()->diffInMinutes($booking->start_date);

        $rates = $tariff->rates()->whereRaw("period < '[21,21]'::int4range")->get();

        $minutesDiffTemp = 0;

        foreach ($rates as $rate) {
            $minutesDiffTemp = $minutesDiff - $rate->to_period;

            if ($minutesDiff > $rate->to_period) {
                $cost += ($minutesDiffTemp - $rate->from_period) * $rate->price;
            } else {
                $cost += ($rate->to_period - $rate->from_period) * $rate->price;
            }
        }

        return $cost;
    }
}
