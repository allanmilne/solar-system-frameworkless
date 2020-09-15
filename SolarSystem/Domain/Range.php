<?php

namespace SolarSystem\Domain;

final class Range
{
    private $innerEdge;

    private $outerEdge;

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