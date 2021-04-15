<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\AstronomicalUnit;
use SolarSystem\Domain\Mass;
use SolarSystem\Domain\MoonId;
use SolarSystem\Domain\Planet;
use SolarSystem\Domain\PlanetId;

class PlanetTest extends TestCase
{
    public function test_planet_requires_id_name_au_and_mass(): void
    {
        $planetId       = PlanetId::generate();
        $planetDistance = new AstronomicalUnit(5.2);
        $planetMass     = new Mass(1.9E+27);
        $planet         = new Planet(
            $planetId,
            'Jupiter',
            $planetDistance,
            $planetMass
        );

        self::assertEquals($planetId, $planet->getId());
        self::assertEquals('Jupiter', $planet->getName());
        self::assertEquals($planetDistance, $planet->getDistance());
        self::assertEquals($planetMass, $planet->calculateMass());
    }

    public function test_planet_can_be_instantiated_with_zero_moons(): void
    {
        $planetId       = PlanetId::generate();
        $planetDistance = new AstronomicalUnit(5.2);
        $planetMass     = new Mass(1.9E+27);
        $planet         = new Planet(
            $planetId,
            'Jupiter',
            $planetDistance,
            $planetMass
        );

        self::assertAttributeCount(0, 'moons', $planet);
    }

    public function test_planet_can_discover_moon(): void
    {
        $planetId       = PlanetId::generate();
        $planetDistance = new AstronomicalUnit(5.2);
        $planetMass     = new Mass(1.9E+27);
        $planet         = new Planet(
            $planetId,
            'Jupiter',
            $planetDistance,
            $planetMass
        );

        $planet->discoverMoon(
            MoonId::generate(),
            'Luna',
            new AstronomicalUnit(1),
            new Mass(7.35E+22)
        );

        self::assertAttributeCount(1, 'moons', $planet);
    }

    public function test_planet_can_get_total_mass_of_moons(): void
    {
        $planetId       = PlanetId::generate();
        $planetDistance = new AstronomicalUnit(5.2);
        $planetMass     = new Mass(1.9E+27);
        $planet         = new Planet(
            $planetId,
            'Jupiter',
            $planetDistance,
            $planetMass
        );

        $moonId = MoonId::generate();
        $planet->discoverMoon(
            $moonId,
            'Luna',
            new AstronomicalUnit(1),
            new Mass(7.35E+22)
        );

        self::assertAttributeCount(1, 'moons', $planet);

        self::assertAttributeEquals(7.35E+22, 'value', $planet->getTotalMassOfMoons());
    }

    public function test_can_calculate_total_mass_of_planet_and_its_moons(): void
    {
        $planetId       = PlanetId::generate();
        $planetDistance = new AstronomicalUnit(5.2);
        $planetMass     = new Mass(1.9E+27);
        $planet         = new Planet(
            $planetId,
            'Jupiter',
            $planetDistance,
            $planetMass
        );

        $moonId = MoonId::generate();
        $planet->discoverMoon(
            $moonId,
            'Luna',
            new AstronomicalUnit(1),
            new Mass(7.35E+22)
        );

        self::assertAttributeCount(1, 'moons', $planet);

        self::assertAttributeEquals(1.9000735E+27, 'value', $planet->calculateMass());
    }
}
