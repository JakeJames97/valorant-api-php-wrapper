<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\API;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\API\Account;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\AccountDTO;
use JakeJames\ValorantApiPhpWrapper\DTO\ActiveShardDTO;
use JakeJames\ValorantApiPhpWrapper\Enum\RiotRegion;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getAccountByPuuidReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'puuid' => 'RGAPI-2fc5278a-c33b-4c2b-bfce-0ba383e7c57a',
            'gameName' => 'test',
            'tagLine' => '6882',
        ]);

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getAccountByPuuid('test');

        $this->assertEquals(200, $response['status']);
        $this->assertEquals(new AccountDTO(json_decode($body, true)), $response['data']);
    }

    /** @test */
    public function getAccountByPuuidReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getAccountByPuuid('test');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }

    /** @test */
    public function getAccountByRiotIdReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'puuid' => 'RGAPI-2fc5278a-c33b-4c2b-bfce-0ba383e7c57a',
            'gameName' => 'test',
            'tagLine' => '6882',
        ]);

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getAccountByRiotId('test#6882');

        $this->assertEquals(200, $response['status']);
        $this->assertEquals(new AccountDTO(json_decode($body, true)), $response['data']);
    }

    /** @test */
    public function getAccountByRiotIdReturnsErrorWithInvalidId(): void
    {
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getAccountByRiotId('invalid');

        $this->assertEquals('Invalid Riot ID, e.g - example#1234', $response['error']);

        $this->assertEquals(422, $response['status']);
    }

    /** @test */
    public function getAccountByRiotIdReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getAccountByRiotId('test#6882');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }

    /** @test */
    public function getShardByPuuidReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'puuid' => 'RGAPI-2fc5278a-c33b-4c2b-bfce-0ba383e7c57a',
            'game' => 'val',
            'activeShard' => 'eu',
        ]);

        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getShard('test');

        $this->assertEquals(200, $response['status']);

        $this->assertEquals(new ActiveShardDTO(json_decode($body, true)), $response['data']);
    }

    /** @test */
    public function getShardByPuuidReturnsResponseAsExpectedWithFailedRequest(): void
    {
        $mock = new MockHandler([
            new Response(404, ['X-Riot-Token' => 'testing'], 'test body'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', RiotRegion::EUROPE());

        $clientWrapper->setClient($client);

        $account = new Account($clientWrapper);

        $response = $account->getShard('test');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
