<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

interface SolarSystems
{
    public function add(SolarSystem $solarSystem);

    public function find(SolarSystemId $solarSystemId): SolarSystem;
}
