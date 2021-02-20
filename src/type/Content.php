<?php

namespace JakeJames\ValorantApiPhpWrapper\type;

class Content
{
    protected $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
