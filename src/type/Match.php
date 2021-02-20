<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

class Match
{
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
