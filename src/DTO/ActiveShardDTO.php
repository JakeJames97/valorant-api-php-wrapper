<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ActiveShardDTO extends DataTransferObject
{
    /**
     * @var string $puuid
     */
    public $puuid;

    /**
     * @var string $game
     */
    public $game;

    /**
     * @var string $tagLine
     */
    public $activeShard;
}
