<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\AstronomicalUnit;
use SolarSystem\Domain\HabitableZone;
use SolarSystem\Domain\Mass;
use SolarSystem\Domain\PlanetId;
use SolarSystem\Domain\Radius;
use SolarSystem\Domain\Range;
use SolarSystem\Domain\SolarSystem;
use SolarSystem\Domain\SolarSystemId;
use SolarSystem\Domain\Star;
use SolarSystem\Domain\StarId;

class RangeTest extends TestCase
{
    /**
     * @var SolarSystem
     */
    private $solarSystem;

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
                $habitableZone
        );
    }

    public function test_range_can_detect_collision(): void
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
        self::assertTrue(
            $newRange->withinRange($objectWithinCollisionRange)
        );

        self::assertFalse(
            $newRange->withinRange($planetDistance)
        );
    }
}
