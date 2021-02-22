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

    public function getLeaderboardByAct(string $actId): array
    {
        $response = $this->get('leaderboards/by-act/' . $actId);

        if ($response === null || $response->getStatusCode() !== 200) {
            return [
                'error' => 'Failed to pull back content from the Valorant API',
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
