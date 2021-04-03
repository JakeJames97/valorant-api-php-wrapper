<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\API;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\API\Status;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\StatusDTO;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getPlatformDataReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'id' => 'test',
            'name' => 'testing',
            'locales' => [
                'de_DE',
                'fr_FR',
            ],
            'maintenances' => [],
            'incidents' => [],
        ]);

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body)
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $status = new Status($clientWrapper);

        $response = $status->getPlatformData();

        $data = new StatusDTO(json_decode($body, true));

        $this->assertEquals(200, $response['status']);
        $this->assertEquals($data->toArray(), $response['data']);
    }

    /** @test */
    public function getPlatformDataReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $body = json_encode([
            'id' => 'test',
            'name' => 'testing',
            'locales' => [
                'de_DE',
                'fr_FR',
            ],
            'maintenances' => [],
            'incidents' => [],
        ]);
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $status = new Status($clientWrapper);

        $response = $status->getPlatformData();

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
