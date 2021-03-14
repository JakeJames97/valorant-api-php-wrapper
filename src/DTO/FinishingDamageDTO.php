<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class FinishingDamageDTO extends DataTransferObject
{
    /**
     * @var string $damageType
     */
    public $damageType;

    /**
     * @var string $damageItem
     */
    public $damageItem;

    /**
     * @var boolean $isSecondaryFireMode
     */
    public $isSecondaryFireMode;
}
