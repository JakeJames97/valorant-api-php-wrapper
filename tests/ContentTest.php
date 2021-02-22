<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\type\Content;
use PHPUnit\Framework\TestCase;

class ContentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getContentReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $content = new Content('testing', $client);

        $response = $content->getContent();

        $this->assertEquals(200, $response['status']);
    }

    /** @test */
    public function getContentReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(202, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $content = new Content('testing', $client);

        $response = $content->getContent();

        $this->assertEquals('Failed to pull back content from the Valorant API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
