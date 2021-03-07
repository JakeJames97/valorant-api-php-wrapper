<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\StatusDTO;

class Status
{
    /**
     * @var ClientWrapper $client
     */
    protected $client;

    public function __construct(ClientWrapper $client)
    {
        $this->client = $client;
    }

    public function getPlatformData(): array
    {
        $data = $this->client->get('val/status/v1/platform-data');

        if ($data['status'] !== 200) {
            return $data;
        }

        $data['data'] = new StatusDTO($data['data']);

        return $data;
    }
}
