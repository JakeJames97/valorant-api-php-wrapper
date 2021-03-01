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
        return $this->client->get('val/ranked/v1/leaderboards/by-act/' . $actId);
    }
}
