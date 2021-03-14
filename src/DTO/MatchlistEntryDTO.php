<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MatchlistEntryDTO extends DataTransferObject
{
    /**
     * @var string $matchId
     */
    public $matchId;

    /**
     * @var string $gameStartTimeMillis
     */
    public $gameStartTimeMillis;

    /**
     * @var string $teamId
     */
    public $teamId;
}
