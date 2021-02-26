<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;

class Ranked
{
    /**
     * @var ClientWrapper $client
     */
    protected $client;

    public function __construct(ClientWrapper $client)
    {
        $this->client = $client;
    }

    public function getLeaderboardByAct(string $actId): array
    {
        $response = $this->client->get('ranked/v1/leaderboards/by-act/' . $actId);

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
