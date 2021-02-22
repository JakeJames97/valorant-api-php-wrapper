<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\type;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\type\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getLeaderboardByActReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $status = new Status('testing', $client);

        $response = $status->getPlatformData();

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

        $status = new Status('testing', $client);

        $response = $status->getPlatformData();

        $this->assertEquals('Failed to pull back content from the Valorant API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
