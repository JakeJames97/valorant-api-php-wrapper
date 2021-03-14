<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class RecentMatchesDTO extends DataTransferObject
{
    /**
     * @var string $currentTime
     */
    public $currentTime;

    /**
     * @var array $matchIds
     */
    public $matchIds;
}
