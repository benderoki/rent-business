<?php

namespace App\Listeners;

use App\Events\ClientMessageCreated;
use App\MessageSender;

class SendMessage
{
    public $messageSender;

    public function __construct(MessageSender $messageSender)
    {
        $this->messageSender = $messageSender;
    }

    /**
     * Handle the event.
     *
     * @param ClientMessageCreated $event
     * @return void
     */
    public function handle(ClientMessageCreated $event)
    {
        $this->messageSender->send($event->clientMessage);
    }
}
