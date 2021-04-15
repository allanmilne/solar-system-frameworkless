<?php
declare(strict_types=1);

namespace SolarSystem\Infrastructure;

use SolarSystem\Domain\SolarSystem;
use SolarSystem\Domain\SolarSystemId;
use SolarSystem\Domain\SolarSystems;

final class InMemorySolarSystems implements SolarSystems
{
    private array $solarSystems = [];

    public function add(SolarSystem $solarSystem): void
    {
        $this->solarSystems[(string)$solarSystem->getId()] = $solarSystem;
    }

    public function find(SolarSystemId $solarSystemId): SolarSystem
    {
        return $this->solarSystems[(string)$solarSystemId];
    }
}
