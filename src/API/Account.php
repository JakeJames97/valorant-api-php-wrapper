<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\AccountDTO;
use JakeJames\ValorantApiPhpWrapper\DTO\ActiveShardDTO;

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
        $data = $this->client->get('riot/account/v1/accounts/by-puuid/' . $puuid);

        if ($data['status'] !== 200) {
            return $data;
        }

        $dto = new AccountDTO($data['data']);

        $data['data'] = $dto->toArray();

        return $data;
    }

    /**
     * @param string $riotId
     *
     * @return array|AccountDTO
     */
    public function getAccountByRiotId(string $riotId)
    {
        if (strpos($riotId, '#') === false) {
            return [
                'error' => 'Invalid Riot ID, e.g - example#1234',
                'status' => 422,
            ];
        }
        $id = explode('#', $riotId);

        $data = $this->client->get('/riot/account/v1/accounts/by-riot-id/' . $id[0] . '/' . $id[1]);

        if ($data['status'] !== 200) {
            return $data;
        }

        $dto= new AccountDTO($data['data']);

        $data['data'] = $dto->toArray();

        return $data;
    }

    public function getShard(string $puuid): array
    {
        $data = $this->client->get('/riot/account/v1/active-shards/by-game/val/by-puuid/' . $puuid);

        if ($data['status'] !== 200) {
            return $data;
        }

        $dto = new ActiveShardDTO($data['data']);

        $data['data'] = $dto->toArray();

        return $data;
    }
}
