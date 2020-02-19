<?php

namespace App;

use App\Contracts\SmsSenderContract;
use App\Models\ClientMessage;

class MessageSender
{
    private $sender;

    public function __construct(SmsSenderContract $smsSender)
    {
        $this->sender = $smsSender;
    }

    public function send(ClientMessage $clientMessage)
    {
        $this->sender->send($clientMessage->client->phone, $clientMessage->message);
    }
}
