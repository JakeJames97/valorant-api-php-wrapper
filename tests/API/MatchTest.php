<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\API;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\API\MatchApi;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\MatchDTO;
use JakeJames\ValorantApiPhpWrapper\DTO\MatchlistDTO;
use JakeJames\ValorantApiPhpWrapper\DTO\RecentMatchesDTO;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getMatchByIdReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = file_get_contents('./tests/Json/MatchResponse.json');

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getMatchById('test');

        $data = new MatchDTO(json_decode($body, true));

        $this->assertEquals(200, $response['status']);

        $this->assertEquals($data->toArray(), $response['data']);
    }

    /** @test */
    public function getMatchByIdReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getMatchById('test');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }

    /** @test */
    public function getMatchByPuuidReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'puuid' => '039y84hf998fg93g',
            'history' => [
                [
                    'matchId' => '474387rfiu',
                    'gameStartTimeMillis' => '48374837847834',
                    'teamId' => '43849389348',
                ]
            ],
        ]);

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getMatchByPuuid('test');

        $data = new MatchlistDTO(json_decode($body, true));

        $this->assertEquals(200, $response['status']);
        $this->assertEquals($data->toArray(), $response['data']);
    }

    /** @test */
    public function getMatchByPuuidReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getMatchByPuuid('test');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }

    /** @test */
    public function getRecentMatchesReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'currentTime' => '39843898743',
            'matchIds' => ['123,244,545,454'],
        ]);

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getRecentMatches('competitive');

        $data = new RecentMatchesDTO(json_decode($body, true));

        $this->assertEquals(200, $response['status']);

        $this->assertEquals($data->toArray(), $response['data']);
    }

    /** @test */
    public function getRecentMatchesReturnsErrorMessageWhenQueueIsInvalid(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getRecentMatches('incorrect queue');

        $this->assertEquals('Invalid Queue type', $response['error']);
        $this->assertEquals(422, $response['status']);
    }

    /** @test */
    public function getRecentMatchesReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new MatchApi($clientWrapper);

        $response = $match->getRecentMatches('competitive');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
