<?php

return [

    'table_title' => 'Rentables',

    'create_title' => 'Create rentables',
    'name' => 'Name',
    'description' => 'Description',
    'save' => 'Save',

    'items' => [
        'name' => 'Name of item',
        'identification_number' => 'Identification number',
    ],

    'tariff' => [
        'period_type' => 'Type of tariff period',
        'period_types' => [
            'minutly' => 'Minutly',
            'hourly' => 'Hourly',
            'daily' => 'Daily',
            'monthly' => 'Monthly',
        ],
        'bill_type' => 'Bill type',
        'bill_types' => [
            'every_period_time' => 'Every period time',
            'once_per_period' => 'Once per period',
        ]
    ],
    'tariff_rates' => [
        'period_from' => 'Minutly, hourly >=',
        'period_to' => 'Minutly, hourly <',
        'price' => 'Price'
    ]
];
