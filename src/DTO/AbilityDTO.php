<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class AbilityDTO extends DataTransferObject
{
    /**
     * @var string $grenadeEffects
     */
    public $grenadeEffects;

    /**
     * @var string $ability1Effects
     */
    public $ability1Effects;

    /**
     * @var string $ability2Effects
     */
    public $ability2Effects;

    /**
     * @var string $ultimateEffects
     */
    public $ultimateEffects;
}
