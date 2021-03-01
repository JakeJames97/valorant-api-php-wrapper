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
        return $this->client->get('val/match/v1/matches/' . $id);
    }

    public function getMatchByPuuid(string $puuid): array
    {
        return $this->client->get('match/v1/matchlists/by-puuid/' . $puuid);
    }

    public function getRecentMatches(string $queue): array
    {
        if (!$this->isValidQueueType($queue)) {
            return [
                'error' => 'Invalid Queue type',
                'status' => 422,
            ];
        }

        return $this->client->get('match/v1/recent-matches/by-queue/' . $queue);
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
