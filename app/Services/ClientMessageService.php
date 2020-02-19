<?php

namespace App\Services;

use App\Events\ClientMessageCreated;
use App\Models\Client;
use App\Models\ClientMessage;

class ClientMessageService
{
    public function create(Client $client, array $data)
    {
        $clientMessage = new ClientMessage();
        $clientMessage->fill($data);
        $clientMessage->client()->associate($client);
        $clientMessage->save();

        event(new ClientMessageCreated($clientMessage));

        return $clientMessage;
    }
}
