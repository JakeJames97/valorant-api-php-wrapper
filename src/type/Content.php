<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

use GuzzleHttp\Client;

class Content extends Base
{
    public function __construct(string $apiKey)
    {
        Base::__construct(
            $apiKey,
            new Client([
                'base_uri' => 'https://ap.api.riotgames.com/val/content/v1/',
            ])
        );
    }

    public function getContent(): array
    {
        $response = $this->get('val/content/v1/contents');

        if ($response === null) {
            return [
                'error' => 'no response found',
                'status' => 404,
            ];
        }

        return [
            'data' => [
                json_decode($response->getBody(), true),
            ],
            'status' => $response->getStatusCode(),
        ];
    }
}
