<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class LeaderboardDTO extends DataTransferObject
{
    /**
     * @var string $shard
     */
    public $shard;

    /**
     * @var string $actId
     */
    public $actId;

    /**
     * @var string $totalPlayers
     */
    public $totalPlayers;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\LeaderboardPlayerDTO[] */
    public $players;
}
