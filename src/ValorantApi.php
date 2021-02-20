<?php

namespace JakeJames\ValorantApiPhpWrapper;

use JakeJames\ValorantApiPhpWrapper\type\Content;
use JakeJames\ValorantApiPhpWrapper\type\Match;
use JakeJames\ValorantApiPhpWrapper\type\Ranked;
use JakeJames\ValorantApiPhpWrapper\type\Status;

class ValorantApi
{
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function content(): Content
    {
        return new Content($this->apiKey);
    }

    public function ranked(): Ranked
    {
        return new Ranked($this->apiKey);
    }

    public function match(): Match
    {
        return new Match($this->apiKey);
    }

    public function status(): Status
    {
        return new Status($this->apiKey);
    }
}
