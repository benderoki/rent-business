<?php

namespace App\Http\Requests;

use App\Models\Rentable\RentableTariff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentableStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'max:255',
            ],
            'description' => [
                'string',
                'required',
            ],
            'items' => [
                'array'
            ],
            'items.*.name' => [
                'string',
                'required',
                'max:255',
            ],
            'items.*.identification_number' => [
                'string',
                'required',
                'max:255',
            ],
            'tariff.period_type' => [
                'required',
                Rule::in(RentableTariff::PERIOD_TYPES)
            ],
            'tariff.bill_type' => [
                'required',
                Rule::in(RentableTariff::BILL_TYPES)
            ],
            'tariff_rates.*' => [
                'array'
            ],
            'tariff_rates.*.period_from' => [
                'required',
            ],
            'tariff_rates.*.period_to' => [
                'required',
            ],
            'tariff_rates.*.price' => [
                'required',
            ],
        ];
    }
}
