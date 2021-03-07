<?php

namespace JakeJames\ValorantApiPhpWrapper\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ContentDTO extends DataTransferObject
{
    /**
     * @var string $version
     */
    public $version;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $characters;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $maps;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $chromas;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $skins;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $skinLevels;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $equips;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $gameModes;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $sprays;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $sprayLevels;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $charms;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $charmLevels;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $playerCards;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ContentItemDTO[] */
    public $playerTitles;

    /** @var \JakeJames\ValorantApiPhpWrapper\DTO\ActDTO[] */
    public $acts;
}
