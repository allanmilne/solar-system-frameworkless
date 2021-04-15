<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\InvalidRadius;
use SolarSystem\Domain\Radius;

class RadiusTest extends TestCase
{
    public function test_radius_requires_a_size(): void
    {
        $radius = new Radius(100000);

        self::assertEquals(100000, $radius->getSize());
    }

    public function test_radius_can_not_be_negative(): void
    {
        $this->expectException(InvalidRadius::class);

        new Radius(-100);
    }
}
