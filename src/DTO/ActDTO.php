<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ActDTO extends DataTransferObject
{
    /**
     * @var string $name
     */
    public $name;

    /** @var array|null */
    public $localizedNames;

    /**
     * @var string $id
     */
    public $id;

    /**
     * @var string $parentId
     */
    public $parentId;

    /**
     * @var string $type
     */
    public $type;

    /**
     * @var bool $isActive
     */
    public $isActive;
}
