<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function create(array $data)
    {
        $client = new Client();
        $client->fill($data);
        $client->save();

        return $client;
    }
}
