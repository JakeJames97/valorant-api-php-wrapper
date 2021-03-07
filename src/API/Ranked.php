<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\LeaderboardDTO;

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
        $data = $this->client->get('val/ranked/v1/leaderboards/by-act/' . $actId);

        if ($data['status'] !== 200) {
            return $data;
        }

        $data['data'] = new LeaderboardDTO($data['data']);

        return $data;
    }
}
