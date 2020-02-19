<?php

namespace App\Contracts;

interface SmsSenderContract
{
    public function send(string $phone, string $message);
}
