<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests\API;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JakeJames\ValorantApiPhpWrapper\API\Ranked;
use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\LeaderboardDTO;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;
use PHPUnit\Framework\TestCase;

class RankedTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getLeaderboardByActReturnsResponseAsExpectedWithSuccessRequest(): void
    {
        $body = json_encode([
            'shard' => 'testShard',
            'actId' => '1234',
            'totalPlayers' => '20',
            'players' => [
                [
                    'puuid' => '1234',
                    'gameName' => 'test',
                    'tagLine' => '123',
                    'leaderboardRank' => '12',
                    'rankedRating' => '1999',
                    'numberOfWins' => '12',

                ],
            ],
        ]);
        $mock = new MockHandler([
            new Response(200, ['X-Riot-Token' => 'testing'], $body),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $clientWrapper = new ClientWrapper('testing', ValorantRegion::EUROPE());

        $clientWrapper->setClient($client);

        $ranked = new Ranked($clientWrapper);

        $response = $ranked->getLeaderboardByAct('test');

        $this->assertEquals(200, $response['status']);
        $this->assertEquals(new LeaderboardDTO(json_decode($body, true)), $response['data']);
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

        $match = new Ranked($clientWrapper);

        $response = $match->getLeaderboardByAct('test');

        $this->assertEquals('Failed to pull back content from the Riot API', $response['error']);

        $this->assertEquals(404, $response['status']);
    }
}
