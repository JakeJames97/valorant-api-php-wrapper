<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;

class Match
{
    /**
     * @var ClientWrapper $client
     */
    protected $client;

    public function __construct(ClientWrapper $client)
    {
        $this->client = $client;
    }

    public function getMatchById(string $id): array
    {
        $response = $this->client->get('match/v1/matches/' . $id);

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

    public function getMatchByPuuid(string $puuid): array
    {
        $response = $this->client->get('match/v1/matchlists/by-puuid/' . $puuid);

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

    public function getRecentMatches(string $queue): array
    {
        if (!$this->isValidQueueType($queue)) {
            return [
                'error' => 'Invalid Queue type',
                'status' => 422,
            ];
        }
        $response = $this->client->get('match/v1/recent-matches/by-queue/' . $queue);

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

    private function isValidQueueType(string $queue): bool
    {
        if ($queue === 'unrated') {
            return true;
        }
        if ($queue === 'competitive') {
            return true;
        }
        if ($queue === 'spikerush') {
            return true;
        }

        return false;
    }
}
