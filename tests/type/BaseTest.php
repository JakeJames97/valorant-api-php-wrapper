<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\type;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\type\Base;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class BaseTest extends TestCase
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

        $base = new Base('testing', $client);

        $response = $base->get('val/content/v1/contents');

        $this->assertEquals(200, $response->getStatusCode());

        $body = $response->getBody()->getContents();

        $this->assertEquals('test body', $body);
    }

    /** @test */
    public function baseGetRequestReturnsExceptionIfRequestFails(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Error occurred when calling the valorant api');
        $this->expectExceptionCode(500);

        $mock = new MockHandler([
            new RequestException('Error Occurred', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $base = new Base('testing', $client);

        $base->get('val/content/v1/contents');
    }
}
