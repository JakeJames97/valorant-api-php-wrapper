<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

class Ranked
{
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
