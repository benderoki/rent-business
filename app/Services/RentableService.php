<?php

namespace App\Services;

use App\Models\Office;
use App\Models\Rentable\Rentable;
use App\Models\Rentable\RentableItem;
use App\Models\Rentable\RentableTariff;
use App\Models\Rentable\RentableTariffRate;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RentableService
{
    public function create(array $data)
    {
        $rentableTariff = new RentableTariff();
        $rentableTariff->fill($data['tariff']);
        $rentableTariff->save();

        $rentableTariffRates = [];

        foreach ($data['tariff_rates'] as $rate) {
            $rentableTariffRates[] = new RentableTariffRate([
                'period' => sprintf('[%s, %s)', $rate['period_from'], $rate['period_to']),
                'price' => $rate['price'],
            ]);
        }

        $rentableTariff->rates()->saveMany($rentableTariffRates);

        $rentable = new Rentable([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $rentable->tariff()->associate($rentableTariff);
        $rentable->save();

        $rentableItems = [];
        foreach ($data['items'] as $item) {
            $rentableItems[] = new RentableItem([
                'name' => $item['name'],
                'identification_number' => $item['identification_number'],
            ]);
        }
        $rentable->items()->saveMany($rentableItems);


    }
}
