<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class EconomyDTO extends DataTransferObject
{
    /**
     * @var int $loadoutValue
     */
    public $loadoutValue;

    /**
     * @var string $weapon
     */
    public $weapon;

    /**
     * @var string $armor
     */
    public $armor;

    /**
     * @var int $remaining
     */
    public $remaining;

    /**
     * @var int $spent
     */
    public $spent;
}
