<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PlayerLocationsDTO extends DataTransferObject
{
    /**
     * @var string $puuid
     */
    public $puuid;

    /**
     * @var float $viewRadians
     */
    public $viewRadians;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\LocationDTO */
    public $location;
}
