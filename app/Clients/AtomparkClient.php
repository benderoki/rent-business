<?php

namespace App\Clients;

use App\Contracts\SmsSenderContract;
use GuzzleHttp\Client;

class AtomparkClient implements SmsSenderContract
{
    public const BASE_URI = 'http://api.atompark.com/api/sms/3.0/';

    private $client;
    private $publicKey;
    private $privateKey;

    public function __construct(string $publicKey, string $privateKey)
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
        ]);
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    public function sign($action, $data)
    {
        $data['version'] = '3.0';
        $data['action'] = $action;
        $data['key'] = $this->publicKey;
        ksort($data);
        $dataString = implode('', $data);
        $dataString .= $this->privateKey;
        $data['sum'] = md5($dataString);

        return $data;
    }

    public function post($method, $data)
    {
        return $this->client->post($method, [
            'form_params' => $this->sign($method, $data),
        ]);
    }

    public function send(string $phone, string $message)
    {
        $this->post('sendSMS', [
            'sender' => 'TEST',
            'phone' => $phone,
            'text' => $message
        ]);
    }
}
