<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    public function setUp(): void
    {
        $starId             = StarId::generate();
        $starMass           = new Mass(1.989E+30);
        $hzInnerEdge  = new AstronomicalUnit(1);
        $hzOuterEdge  = new AstronomicalUnit(10);
        $hzRange    = new Range(
            $hzInnerEdge,
            $hzOuterEdge
        );
        $habitableZone = new HabitableZone($hzRange);

        $this->solarSystem  = new SolarSystem(
            SolarSystemId::generate(),
            new Star(
                $starId,
                'Sun',
                new Radius(100000),
                $starMass),
                $habitableZone,
        );
    }

    public function test_range_can_detect_collision()
    {
        $newRange   = new Range(
            new AstronomicalUnit(2.2),
            new AstronomicalUnit(3.2)
        );

        $planetDistance = new AstronomicalUnit(1.0);
        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Earth',
            $planetDistance,
            new Mass(5.97E+24)
        );

        $objectWithinCollisionRange = new AstronomicalUnit(2.5);
        $this->assertTrue(
            $newRange->withinRange($objectWithinCollisionRange)
        );

        $this->assertFalse(
            $newRange->withinRange($planetDistance)
        );
    }
}
