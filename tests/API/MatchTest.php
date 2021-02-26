<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\API;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\API\Match;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
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
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new Match($clientWrapper);

        $response = $match->getMatchById('test');

        $this->assertEquals(200, $response['status']);
    }

    /** @test */
    public function getMatchByIdReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(202, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new Match($clientWrapper);

        $response = $match->getMatchById('test');

        $this->assertEquals('Failed to pull back content from the Valorant API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }

    /** @test */
    public function getMatchByPuuidReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new Match($clientWrapper);

        $response = $match->getMatchByPuuid('test');

        $this->assertEquals(200, $response['status']);
    }

    /** @test */
    public function getMatchByPuuidReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(202, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new Match($clientWrapper);

        $response = $match->getMatchByPuuid('test');

        $this->assertEquals('Failed to pull back content from the Valorant API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
    /** @test */
    public function getRecentMatchesReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new Match($clientWrapper);

        $response = $match->getRecentMatches('competitive');

        $this->assertEquals(200, $response['status']);
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

        $match = new Match($clientWrapper);

        $response = $match->getRecentMatches('incorrect queue');

        $this->assertEquals('Invalid Queue type', $response['error']);
        $this->assertEquals(422, $response['status']);
    }

    /** @test */
    public function getRecentMatchesReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(202, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $match = new Match($clientWrapper);

        $response = $match->getRecentMatches('competitive');

        $this->assertEquals('Failed to pull back content from the Valorant API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
