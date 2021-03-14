<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class KillDTO extends DataTransferObject
{
    /**
     * @var int $timeSinceGameStartMillis
     */
    public $timeSinceGameStartMillis;

    /**
     * @var int $timeSinceRoundStartMillis
     */
    public $timeSinceRoundStartMillis;

    /**
     * @var string $killer
     */
    public $killer;

    /**
     * @var string $victim
     */
    public $victim;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\LocationDTO */
    public $victimLocation;

    /**
     * @var array $assistants
     */
    public $assistants;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\PlayerLocationsDTO[] */
    public $playerLocations;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\FinishingDamageDTO */
    public $finishingDamage;
}
