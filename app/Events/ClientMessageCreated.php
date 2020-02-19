<?php

namespace App\Events;

use App\Models\ClientMessage;
use Illuminate\Queue\SerializesModels;

class ClientMessageCreated
{
    use SerializesModels;

    public $clientMessage;

    public function __construct(ClientMessage $clientMessage)
    {
        $this->clientMessage = $clientMessage;
    }
}
