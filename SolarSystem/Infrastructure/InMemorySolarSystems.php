<?php

namespace SolarSystem\Infrastructure;

use SolarSystem\Domain\Identity;
use SolarSystem\Domain\SolarSystem;
use SolarSystem\Domain\SolarSystems;

final class InMemorySolarSystems implements SolarSystems
{
    private $solarSystems = [];

    public function add(SolarSystem $solarSystem): void
    {
        $this->solarSystems[(string) $solarSystem->getId()] = $solarSystem;
    }

    public function find(Identity $solarSystemId): SolarSystem
    {
        return $this->solarSystems[(string) $solarSystemId];
    }
}
