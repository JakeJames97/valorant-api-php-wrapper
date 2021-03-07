<?php

namespace JakeJames\ValorantApiPhpWrapper\API;

use JakeJames\ValorantApiPhpWrapper\ClientWrapper;
use JakeJames\ValorantApiPhpWrapper\DTO\ContentDTO;

class Content
{
    /**
     * @var ClientWrapper $client
     */
    protected $client;

    public function __construct(ClientWrapper $client)
    {
        $this->client = $client;
    }

    public function getContent(): array
    {
        $data = $this->client->get('val/content/v1/contents');

        if ($data['status'] !== 200) {
            return $data;
        }

        $data['data'] = new ContentDTO($data['data']);

        return $data;
    }
}
