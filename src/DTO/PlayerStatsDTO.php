<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PlayerStatsDTO extends DataTransferObject
{
    /**
     * @var int $score
     */
    public $score;

    /**
     * @var int $roundsPlayed
     */
    public $roundsPlayed;

    /**
     * @var int $kills
     */
    public $kills;

    /**
     * @var int $deaths
     */
    public $deaths;

    /**
     * @var int $assists
     */
    public $assists;

    /**
     * @var int $playtimeMillis
     */
    public $playtimeMillis;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\AbilityCastsDTO */
    public $abilityCasts;
}
