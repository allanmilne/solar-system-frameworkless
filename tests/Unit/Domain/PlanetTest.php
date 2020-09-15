<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;

class PlanetTest extends TestCase
{
    public function test_planet_requires_id_name_au_and_mass()
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

        $this->assertEquals($planetId, $planet->getId());

        $this->assertEquals('Jupiter', $planet->getName());

        $this->assertEquals($planetDistance, $planet->getDistance());

        $this->assertEquals($planetMass, $planet->calculateMass());
    }

    public function test_planet_can_be_instantiated_with_zero_moons()
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

        $this->assertAttributeCount(0, 'moons', $planet);
    }

    public function test_planet_can_discover_moon()
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

        $this->assertAttributeCount(1, 'moons', $planet);
    }

    public function test_planet_can_get_total_mass_of_moons()
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

        $this->assertAttributeCount(1, 'moons', $planet);

        $this->assertAttributeEquals(7.35E+22, 'value', $planet->getTotalMassOfMoons());
    }

    public function test_can_calculate_total_mass_of_planet_and_its_moons()
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

        $this->assertAttributeCount(1, 'moons', $planet);

        $this->assertAttributeEquals(1.9000735E+27, 'value', $planet->calculateMass());
    }
}
