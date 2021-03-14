<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MatchInfoDTO extends DataTransferObject
{
    /**
     * @var string $matchId
     */
    public $matchId;

    /**
     * @var string $mapId
     */
    public $mapId;

    /**
     * @var int $gameLengthMillis
     */
    public $gameLengthMillis;

    /**
     * @var string $gameStartMillis
     */
    public $gameStartMillis;

    /**
     * @var string $provisioningFlowId
     */
    public $provisioningFlowId;

    /**
     * @var boolean $isCompleted
     */
    public $isCompleted;

    /**
     * @var string $customGameName
     */
    public $customGameName;

    /**
     * @var string $queueId
     */
    public $queueId;

    /**
     * @var string $gameMode
     */
    public $gameMode;

    /**
     * @var boolean $isRanked
     */
    public $isRanked;

    /**
     * @var string $seasonId
     */
    public $seasonId;
}
