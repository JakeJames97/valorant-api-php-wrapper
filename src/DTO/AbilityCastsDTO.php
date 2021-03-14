<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class AbilityCastsDTO extends DataTransferObject
{
    /**
     * @var int $grenadeCasts
     */
    public $grenadeCasts;

    /**
     * @var int $ability1Casts
     */
    public $ability1Casts;

    /**
     * @var int $ability2Casts
     */
    public $ability2Casts;

    /**
     * @var int $ultimateCasts
     */
    public $ultimateCasts;
}
