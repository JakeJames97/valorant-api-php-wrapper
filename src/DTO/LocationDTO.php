<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class LocationDTO extends DataTransferObject
{
    /**
     * @var int $x
     */
    public $x;

    /**
     * @var int $y
     */
    public $y;
}
