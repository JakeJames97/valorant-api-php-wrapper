<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class MatchDTO extends DataTransferObject
{
    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\MatchInfoDTO */
    public $matchInfo;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\PlayerDTO[] */
    public $players;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\TeamDTO[] */
    public $teams;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\RoundResultDTO[] */
    public $roundResults;
}
