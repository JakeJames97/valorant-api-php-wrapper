<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class LeaderboardPlayerDTO extends DataTransferObject
{
    /**
     * @var string $puuid
     */
    public $puuid;

    /**
     * @var string $gameName
     */
    public $gameName;

    /**
     * @var string $tagLine
     */
    public $tagLine;

    /**
     * @var string $leaderboardRank
     */
    public $leaderboardRank;

    /**
     * @var string $rankedRating
     */
    public $rankedRating;

    /**
     * @var string $numberOfWins
     */
    public $numberOfWins;
}
