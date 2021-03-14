<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PlayerRoundStatsDTO extends DataTransferObject
{
    /**
     * @var string $puuid
     */
    public $puuid;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\KillDTO[] */
    public $kills;


    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\DamageDTO[] */
    public $damage;

    /**
     * @var int $score
     */
    public $score;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\EconomyDTO */
    public $economy;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\AbilityDTO */
    public $ability;
}
