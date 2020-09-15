<?php

namespace SolarSystem\Application\Commands;

use SolarSystem\Domain\SolarSystems;

final class DiscoverPlanetHandler
{
    private $solarSystems;  // interface

    public function __construct(SolarSystems $solarSystems)
    {
        $this->solarSystems = $solarSystems;
    }

    public function handle(DiscoverPlanet $command): void
    {
        $solarSystem = $this->solarSystems->find(
            $command->getSolarSystemId()
        );

        $solarSystem->discoverPlanet(
            $command->getPlanetId(),
            $command->getName(),
            $command->getDistance(),
            $command->getMass()
        );

        $this->solarSystems->add($solarSystem);
    }
}
