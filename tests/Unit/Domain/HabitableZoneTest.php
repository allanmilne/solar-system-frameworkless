<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\AstronomicalUnit;
use SolarSystem\Domain\HabitableZone;
use SolarSystem\Domain\Range;

class HabitableZoneTest extends TestCase
{
    public function test_it_knows_if_a_distance_is_within_its_range(): void
    {
        $innerEdge  = new AstronomicalUnit(1);
        $outerEdge  = new AstronomicalUnit(10);
        $hzRange    = new Range(
            $innerEdge,
            $outerEdge
        );
        $habitableZone = new HabitableZone($hzRange);

        self::assertTrue(
            $habitableZone->withinZone(new AstronomicalUnit(3))
        );
    }

    public function test_it_knows_if_a_distance_is_outwith_its_range(): void
    {
        $hzInnerEdge    = new AstronomicalUnit(1);
        $hzOuterEdge    = new AstronomicalUnit(10);
        $hzRange        = new Range(
            $hzInnerEdge,
            $hzOuterEdge
        );
        $habitableZone = new HabitableZone($hzRange);

        self::assertFalse(
            $habitableZone->withinZone(new AstronomicalUnit(999))
        );
    }

    public function test_habitable_zone_can_be_retrieved(): void
    {
        $hzInnerEdge    = new AstronomicalUnit(1);
        $hzOuterEdge    = new AstronomicalUnit(10);
        $hzRange        = new Range(
            $hzInnerEdge,
            $hzOuterEdge
        );

        $this->assertAttributeEquals($hzInnerEdge, 'innerEdge', $hzRange);

        $this->assertAttributeEquals($hzOuterEdge, 'outerEdge', $hzRange);
    }
}
