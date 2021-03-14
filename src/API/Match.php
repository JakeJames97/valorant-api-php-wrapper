<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\MatchDTO;
use JakeJames\ValorantApiPhpWrapper\DTO\MatchlistDTO;
use JakeJames\ValorantApiPhpWrapper\DTO\RecentMatchesDTO;

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
        $data = $this->client->get('val/match/v1/matches/' . $id);

        if ($data['status'] !== 200) {
            return $data;
        }

        $data['data'] = new MatchDTO($data['data']);

        return $data;
    }

    public function getMatchByPuuid(string $puuid): array
    {
        $data = $this->client->get('match/v1/matchlists/by-puuid/' . $puuid);

        if ($data['status'] !== 200) {
            return $data;
        }

        $data['data'] = new MatchlistDTO($data['data']);

        return $data;
    }

    public function getRecentMatches(string $queue): array
    {
        if (!$this->isValidQueueType($queue)) {
            return [
                'error' => 'Invalid Queue type',
                'status' => 422,
            ];
        }

        $data = $this->client->get('match/v1/recent-matches/by-queue/' . $queue);

        if ($data['status'] !== 200) {
            return $data;
        }

        $data['data'] = new RecentMatchesDTO($data['data']);

        return $data;
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
