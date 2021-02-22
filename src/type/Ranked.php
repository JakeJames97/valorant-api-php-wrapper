<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

use GuzzleHttp\Client;

class Ranked extends Base
{
    public function __construct(string $apiKey, Client $client)
    {
        Base::__construct(
            $apiKey,
            $client
        );
    }
}
