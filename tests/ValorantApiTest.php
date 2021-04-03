<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests;

use JakeJames\ValorantApiPhpWrapper\API\Account;
use JakeJames\ValorantApiPhpWrapper\API\Content;
use JakeJames\ValorantApiPhpWrapper\API\MatchApi;
use JakeJames\ValorantApiPhpWrapper\API\Ranked;
use JakeJames\ValorantApiPhpWrapper\API\Status;
use JakeJames\ValorantApiPhpWrapper\Enum\ValorantRegion;
use JakeJames\ValorantApiPhpWrapper\ValorantApi;
use PHPUnit\Framework\TestCase;

class ValorantApiTest extends TestCase
{
    protected $valorantApi;

    protected function setUp(): void
    {
        parent::setUp();

        $this->valorantApi = new ValorantApi('testing', ValorantRegion::EUROPE());
    }

    /** @test */
    public function callingContentReturnsInstanceOfContent(): void
    {
        $this->assertInstanceOf(Content::class, $this->valorantApi->content());
    }

    /** @test */
    public function callingRankedReturnsInstanceOfRanked(): void
    {
        $this->assertInstanceOf(Ranked::class, $this->valorantApi->ranked());
    }

    /** @test */
    public function callingMatchReturnsInstanceOfMatch(): void
    {
        $this->assertInstanceOf(MatchApi::class, $this->valorantApi->match());
    }

    /** @test */
    public function callingStatusReturnsInstanceOfStatus(): void
    {
        $this->assertInstanceOf(Status::class, $this->valorantApi->status());
    }

    /** @test */
    public function callingAccountReturnsInstanceOfAccount(): void
    {
        $this->assertInstanceOf(Account::class, $this->valorantApi->account());
    }
}
