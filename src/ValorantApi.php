<?php

namespace JakeJames\ValorantApiPhpWrapper;

use GuzzleHttp\Client;
use JakeJames\ValorantApiPhpWrapper\API\Account;
use JakeJames\ValorantApiPhpWrapper\API\Content;
use JakeJames\ValorantApiPhpWrapper\API\MatchApi;
use JakeJames\ValorantApiPhpWrapper\API\Ranked;
use JakeJames\ValorantApiPhpWrapper\API\Status;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;

class ValorantApi
{
    /**
     * @var Client $client
     */
    protected $client;

    public function __construct(string $apiKey, ValorantRegion $valorantRegion)
    {
        $region = $valorantRegion->getValue();
        $this->client = new ClientWrapper($apiKey, $region);
    }

    public function content(): Content
    {
        return new Content($this->client);
    }

    public function ranked(): Ranked
    {
        return new Ranked($this->client);
    }

    public function match(): MatchApi
    {
        return new MatchApi($this->client);
    }

    public function status(): Status
    {
        return new Status($this->client);
    }

    public function account(): Account
    {
        return new Account($this->client);
    }
}
