<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class RoundResultDTO extends DataTransferObject
{
    /**
     * @var int $roundNum
     */
    public $roundNum;

    /**
     * @var string $roundResult
     */
    public $roundResult;

    /**
     * @var string $roundCeremony
     */
    public $roundCeremony;

    /**
     * @var string $winningTeam
     */
    public $winningTeam;

    /**
     * @var string $bombPlanter
     */
    public $bombPlanter;

    /**
     * @var string $bombDefuser
     */
    public $bombDefuser;

    /**
     * @var int $plantRoundTime
     */
    public $plantRoundTime;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\PlayerLocationsDTO[] */
    public $plantPlayerLocations;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\LocationDTO */
    public $plantLocation;

    /**
     * @var string $plantSite
     */
    public $plantSite;

    /**
     * @var int $defuseRoundTime
     */
    public $defuseRoundTime;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\PlayerLocationsDTO[] */
    public $defusePlayerLocations;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\LocationDTO */
    public $defuseLocation;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\PlayerRoundStatsDTO[] */
    public $playerStats;

    /**
     * @var string $roundResultCode
     */
    public $roundResultCode;
}
