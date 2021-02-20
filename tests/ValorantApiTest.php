<?php

namespace JakeJames\ValorantApiPhpWrapper\Tests;

use JakeJames\ValorantApiPhpWrapper\type\Content;
use JakeJames\ValorantApiPhpWrapper\type\Match;
use JakeJames\ValorantApiPhpWrapper\type\Ranked;
use JakeJames\ValorantApiPhpWrapper\type\Status;
use JakeJames\ValorantApiPhpWrapper\ValorantApi;
use PHPUnit\Framework\TestCase;

class ValorantApiTest extends TestCase
{
    protected $valorantApi;

    protected function setUp()
    {
        parent::setUp();

        $this->valorantApi = new ValorantApi('testing');
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
        $this->assertInstanceOf(Match::class, $this->valorantApi->match());
    }

    /** @test */
    public function callingStatusReturnsInstanceOfStatus(): void
    {
        $this->assertInstanceOf(Status::class, $this->valorantApi->status());
    }
}
