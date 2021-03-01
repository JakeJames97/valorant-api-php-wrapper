<?php

namespace JakeJames\ValorantApiPhpWrapper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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

    public function get(string $endpoint, array $params = []): ?array
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
            $response = $this->client->get($endpoint, $options);

            return [
                'data' => json_decode($response->getBody(), true, 512),
                'status' => $response->getStatusCode(),
            ];
        } catch (GuzzleException $exception) {
            return $this->handleErrors($exception->getCode());
        }
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }


    /**
     * Handles the response and throws errors accordingly.
     * @param string $code
     * @return array
     */
    protected function handleErrors(string $code): array
    {
        switch ($code) {
            case 401:
                return [
                    'error' => 'Unauthorized (Invalid API key or insufficient permissions)',
                    'status' => $code,
                ];
            case 404:
                return [
                    'error' => 'Failed to pull back content from the Riot API',
                    'status' => $code,
                ];
            case 500:
            case 502:
            case 503:
            case 504:
                return [
                    'error' => 'Something went wrong on Riot\'s end.',
                    'status' => $code,
                ];
            default:
                return [
                    'error' => 'An unexpected error occurred, please try again',
                    'status' => $code,
                ];
        }
    }
}
