<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

use GuzzleHttp\Client;

class Match extends Base
{
    public function __construct(string $apiKey)
    {
        Base::__construct(
            $apiKey,
            new Client([
                'base_uri' => 'https://ap.api.riotgames.com/val/match/v1/',
            ])
        );
    }
}
