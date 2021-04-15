<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\AsteroidBelt;
use SolarSystem\Domain\AsteroidBeltId;
use SolarSystem\Domain\AstronomicalUnit;
use SolarSystem\Domain\Mass;
use SolarSystem\Domain\Range;

class AsteroidBeltTest extends TestCase
{

    public function test_asteroid_belt_can_calculate_mass(): void
    {
        $innerBelt          = new AstronomicalUnit(2.2);
        $outerBelt          = new AstronomicalUnit(3.2);
        $asteroidBeltRange  = new Range($innerBelt, $outerBelt);
        $beltMass           = new Mass(2.39E+21);

        $asteroidBelt       = new AsteroidBelt(
            AsteroidBeltId::generate(),
            $asteroidBeltRange,
            $beltMass
        );

        $this->assertAttributeEquals($innerBelt, 'innerEdge', $asteroidBeltRange);

        $this->assertAttributeEquals($outerBelt, 'outerEdge', $asteroidBeltRange);

        self::assertEquals($beltMass, $asteroidBelt->calculateMass());
    }
}
