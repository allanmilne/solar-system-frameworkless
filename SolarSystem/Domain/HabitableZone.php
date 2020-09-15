<?php

namespace SolarSystem\Domain;

final class HabitableZone
{
    private $range;

    public function __construct(Range $range)
    {
        $this->range = $range;
    }

    public function withinZone(AstronomicalUnit $planetAU): bool
    {
        return $this->range->withinRange($planetAU);
    }
}
