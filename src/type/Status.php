<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

use GuzzleHttp\Client;

class Status extends Base
{
    public function __construct(string $apiKey)
    {
        Base::__construct(
            $apiKey,
            new Client([
                'base_uri' => 'https://ap.api.riotgames.com/val/status/v1/',
            ])
        );
    }
}
