<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MatchlistDTO extends DataTransferObject
{
    /**
     * @var string $puuid
     */
    public $puuid;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\MatchlistEntryDTO[] */
    public $history;
}
