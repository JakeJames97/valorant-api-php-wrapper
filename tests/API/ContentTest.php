<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\API;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\API\Content;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\ContentDTO;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;
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
        $body = file_get_contents('Tests/Json/ContentResponse.json');

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $content = new Content($clientWrapper);

        $response = $content->getContent();

        $this->assertEquals(200, $response['status']);
    }

    /** @test */
    public function getContentReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $body = file_get_contents('Tests/Json/ContentResponse.json');

        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $content = new Content($clientWrapper);

        $response = $content->getContent();

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
