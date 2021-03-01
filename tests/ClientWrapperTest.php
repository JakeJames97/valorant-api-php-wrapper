<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ClientWrapperTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function baseGetRequestReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $response = $clientWrapper->get('val/content/v1/contents');

        $this->assertEquals(200, $response['status']);
    }

    /** @test */
    public function baseGetRequestReturnsExceptionIfRequestFails(): void
    {
        $mock = new MockHandler([
            new RequestException('Error Occurred', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $response = $clientWrapper->get('val/content/v1/contents');

        $this->assertEquals('An unexpected error occurred, please try again', $response['error']);
    }
}
