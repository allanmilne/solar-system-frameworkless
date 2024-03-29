<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class Range
{
    private AstronomicalUnit $innerEdge;

    private AstronomicalUnit $outerEdge;

    public function __construct(AstronomicalUnit $innerEdge, AstronomicalUnit $outerEdge)
    {
        $this->innerEdge = $innerEdge;
        $this->outerEdge = $outerEdge;
    }

    public function withinRange(AstronomicalUnit $distance): bool
    {
        return ($distance >= $this->innerEdge) && ($distance <= $this->outerEdge);
    }
}
