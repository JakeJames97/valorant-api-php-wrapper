<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class Base
{
    /**
     * @var string $apiKey
     */
    protected $apiKey;

    /**
     * @var Client $client
     */
    protected $client;

    public function __construct(string $apiKey, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
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
}
