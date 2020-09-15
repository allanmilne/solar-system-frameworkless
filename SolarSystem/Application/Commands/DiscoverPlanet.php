<?php

namespace SolarSystem\Application\Commands;

use SolarSystem\Domain\Mass;
use SolarSystem\Domain\PlanetId;
use SolarSystem\Domain\SolarSystemId;
use SolarSystem\Domain\AstronomicalUnit;

final class DiscoverPlanet
{
    private $planetId;

    private $name;

    private $distance;

    private $mass;

    private $solarSystemId;

    public function __construct(PlanetId $planetId, string $name, AstronomicalUnit $distance, Mass $mass, SolarSystemId $solarSystemId)
    {
        $this->planetId         = $planetId;
        $this->name             = $name;
        $this->distance         = $distance;
        $this->mass             = $mass;
        $this->solarSystemId    = $solarSystemId;
    }

    public function getPlanetId(): PlanetId
    {
        return $this->planetId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDistance(): AstronomicalUnit
    {
        return $this->distance;
    }

    public function getMass(): Mass
    {
        return $this->mass;
    }

    public function getSolarSystemId(): SolarSystemId
    {
        return $this->solarSystemId;
    }
}
