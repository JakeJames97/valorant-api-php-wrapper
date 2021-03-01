<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class AccountDTO extends DataTransferObject
{
    /**
     * @var string $puuid
     */
    public $puuid;

    /**
     * @var string $gameName
     */
    public $gameName;

    /**
     * @var string $tagLine
     */
    public $tagLine;
}
