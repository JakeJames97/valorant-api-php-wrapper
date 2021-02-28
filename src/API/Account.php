<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;

class Account
{
    /**
     * @var ClientWrapper $client
     */
    protected $client;

    public function __construct(ClientWrapper $client)
    {
        $this->client = $client;
    }

    public function getAccountByPuuid(string $puuid): array
    {
        $response = $this->client->get('riot/account/v1/accounts/by-puuid/' . $puuid);

        if ($response === null || $response->getStatusCode() !== 200) {
            return [
                'error' => 'Failed to pull back content from the Riot API',
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

    public function getAccountByRiotId(string $riotId): array
    {
        if (strpos($riotId, '#') === false) {
            return [
                'error' => 'Invalid Riot ID, e.g - example#1234',
                'status' => 422,
            ];
        }
        $id = explode('#', $riotId);
        $response = $this->client->get('/riot/account/v1/accounts/by-riot-id/' . $id[0] . '/' . $id[1]);

        if ($response === null || $response->getStatusCode() !== 200) {
            return [
                'error' => 'Failed to pull back content from the Riot API',
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

    public function getShard(string $puuid): array
    {
        $response = $this->client->get('/riot/account/v1/active-shards/by-game/val/by-puuid/' . $puuid);

        if ($response === null || $response->getStatusCode() !== 200) {
            return [
                'error' => 'Failed to pull back content from the Riot API',
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
