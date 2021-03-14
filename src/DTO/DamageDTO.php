<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class DamageDTO extends DataTransferObject
{
    /**
     * @var string $receiver
     */
    public $receiver;

    /**
     * @var int $damage
     */
    public $damage;

    /**
     * @var int $legshots
     */
    public $legshots;

    /**
     * @var int $bodyshots
     */
    public $bodyshots;

    /**
     * @var int $headshots
     */
    public $headshots;
}
