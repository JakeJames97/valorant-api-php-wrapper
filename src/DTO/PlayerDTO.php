<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PlayerDTO extends DataTransferObject
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
     * @var string $teamId
     */
    public $teamId;

    /**
     * @var string $partyId
     */
    public $partyId;

    /**
     * @var string $characterId
     */
    public $characterId;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\PlayerStatsDTO */
    public $stats;

    /**
     * @var int $competitiveTier
     */
    public $competitiveTier;

    /**
     * @var string $playerCard
     */
    public $playerCard;

    /**
     * @var string $playerTitle
     */
    public $playerTitle;
}
