<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class TeamDTO extends DataTransferObject
{
    /**
     * @var string $teamId
     */
    public $teamId;

    /**
     * @var boolean $won
     */
    public $won;

    /**
     * @var int $roundsPlayed
     */
    public $roundsPlayed;

    /**
     * @var int $roundsWon
     */
    public $roundsWon;

    /**
     * @var int $numPoints
     */
    public $numPoints;
}
