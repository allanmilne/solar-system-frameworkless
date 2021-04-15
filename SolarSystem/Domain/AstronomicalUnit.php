<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class AstronomicalUnit
{
    private float $distance;

    public function __construct(float $distance)
    {
        if ($distance < 0) {
            throw new InvalidDistance;
        }

        $this->distance = $distance;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }
}
