<?php

namespace JakeJames\ValorantApiPhpWrapper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class ClientWrapper
{
    /**
     * @var string $apiKey
     */
    protected $apiKey;

    /**
     * @var Client $client
     */
    protected $client;

    public function __construct(string $apiKey, string $region)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://' . $region . '.api.riotgames.com/',
        ]);
    }

    public function get(string $endpoint, array $params = []): ?ResponseInterface
    {
        $options = [
            'query' => [
                $params,
            ],
            'headers' => [
                'X-Riot-Token' => $this->apiKey,
            ]
        ];

        try {
            return $this->client->get($endpoint, $options);
        } catch (GuzzleException $exception) {
            throw new RuntimeException('Error occurred when calling the valorant api', 500);
        }
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }
}
