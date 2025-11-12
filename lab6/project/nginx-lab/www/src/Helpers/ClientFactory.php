<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ClientFactory
{
    public static function make(string $baseUri): Client
    {
        return new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'timeout' => 30,
            'curl' => [
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT => 30,
            ]
        ]);
    }
}
