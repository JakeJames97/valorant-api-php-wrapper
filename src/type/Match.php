<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

use GuzzleHttp\Client;

class Match extends Base
{
    public function __construct(string $apiKey, Client $client)
    {
        Base::__construct(
            $apiKey,
            $client
        );
    }

    public function getMatchById(string $id): array
    {
        $response = $this->get('matches/' . $id);

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
        $response = $this->get('matchlists/by-puuid/' . $puuid);

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
        $response = $this->get('recent-matches/by-queue/' . $queue);

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
