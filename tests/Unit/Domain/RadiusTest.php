<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;

class RadiusTest extends TestCase
{
    public function test_radius_requires_a_size()
    {
        $radius = new Radius(100000);

        $this->assertEquals(100000, $radius->getSize());
    }

    public function test_radius_can_not_be_negative()
    {
        $this->expectException(InvalidRadius::class);

        new Radius(-100);
    }
}
