<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\Mass;
use SolarSystem\Domain\Radius;
use SolarSystem\Domain\Star;
use SolarSystem\Domain\StarId;

class StarTest extends TestCase
{
    public function test_Star_requires_id_name_size_and_mass(): void
    {
        $starId     = StarId::generate();
        $radius     = new Radius(100000);
        $starMass   = new Mass(1.989E+30);
        $star = new Star(
            $starId,
            'Sun',
            $radius,
            $starMass
        );

        self::assertEquals($starId, $star->getId());

        self::assertEquals('Sun', $star->getName());

        self::assertEquals($radius, $star->getSize());

        self::assertEquals($starMass, $star->calculateMass());
    }
}
