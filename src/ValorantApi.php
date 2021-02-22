<?php

namespace JakeJames\ValorantApiPhpWrapper;

use GuzzleHttp\Client;
use JakeJames\ValorantApiPhpWrapper\type\Content;
use JakeJames\ValorantApiPhpWrapper\type\Match;
use JakeJames\ValorantApiPhpWrapper\type\Ranked;
use JakeJames\ValorantApiPhpWrapper\type\Status;

class ValorantApi
{
    /**
     * @var string $apiKey
     */
    protected $apiKey;

    /**
     * @var Client $client
     */
    protected $client;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://ap.api.riotgames.com/val/ranked/v1/',
        ]);
    }

    public function content(): Content
    {
        return new Content($this->apiKey, $this->client);
    }

    public function ranked(): Ranked
    {
        return new Ranked($this->apiKey, $this->client);
    }

    public function match(): Match
    {
        return new Match($this->apiKey, $this->client);
    }

    public function status(): Status
    {
        return new Status($this->apiKey, $this->client);
    }
}
