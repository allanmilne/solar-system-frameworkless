<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\AstronomicalUnit;
use SolarSystem\Domain\Mass;
use SolarSystem\Domain\Moon;
use SolarSystem\Domain\MoonId;

class MoonTest extends Testcase
{
    public function test_moon_requires_id_name_distance_and_mass(): void
    {
        $moonId         = MoonId::generate();
        $moonDistance   = new AstronomicalUnit(1.0026);
        $moonMass       = new Mass(7.35E+22);
        $newMoon        = new Moon(
            $moonId,
            'Luna',
            $moonDistance,
            $moonMass
        );

        $this->assertEquals($moonId, $newMoon->getId());

        $this->assertEquals('Luna', $newMoon->getName());

        $this->assertEquals($moonDistance, $newMoon->getDistance());

        $this->assertEquals($moonMass, $newMoon->calculateMass());
    }
}
