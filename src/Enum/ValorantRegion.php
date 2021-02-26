<?php

namespace JakeJames\ValorantApiPhpWrapper\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static ValorantRegion OCEANIA()
 * @method static ValorantRegion PACIFIC()
 * @method static ValorantRegion BRAZIL()
 * @method static ValorantRegion EUROPE()
 * @method static ValorantRegion KOREA()
 * @method static ValorantRegion LATAM()
 * @method static ValorantRegion AMERICA()
 */
final class ValorantRegion extends Enum
{
    private const OCEANIA = 'ap';
    private const PACIFIC = 'ap';
    private const BRAZIL = 'br';
    private const EUROPE = 'eu';
    private const KOREA = 'kr';
    private const LATAM = 'latam';
    private const AMERICA = 'na';
}
