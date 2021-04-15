<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class HabitableZone
{
    private Range $range;

    public function __construct(Range $range)
    {
        $this->range = $range;
    }

    public function withinZone(AstronomicalUnit $planetAU): bool
    {
        return $this->range->withinRange($planetAU);
    }
}
