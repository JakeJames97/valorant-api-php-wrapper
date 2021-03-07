<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ContentItemDTO extends DataTransferObject
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
     * @var string $assetName
     */
    public $assetName;

    /**
     * @var string|null $assetPath
     */
    public $assetPath;
}
