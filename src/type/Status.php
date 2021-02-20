<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

class Status
{
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
