<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class StatusDTO extends DataTransferObject
{
    /**
     * @var string $id
     */
    public $id;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var array $locales
     */
    public $locales;

    /**
     * @var array $maintenances
     */
    public $maintenances;

    /**
     * @var array $incidents
     */
    public $incidents;
}
