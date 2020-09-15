<?php

namespace Unit\Application\Commands;

use SolarSystem\Domain\Mass;
use SolarSystem\Domain\Star;
use SolarSystem\Domain\Range;
use SolarSystem\Domain\Radius;
use SolarSystem\Domain\StarId;
use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\PlanetId;
use SolarSystem\Domain\SolarSystem;
use SolarSystem\Domain\HabitableZone;
use SolarSystem\Domain\SolarSystemId;
use SolarSystem\Domain\AstronomicalUnit;
use SolarSystem\Application\Commands\DiscoverPlanet;
use SolarSystem\Infrastructure\InMemorySolarSystems;
use SolarSystem\Application\Commands\DiscoverPlanetHandler;

class DiscoverPlanetHandlerTest extends TestCase
{
    private $solarSystems;

    private $handler;

    public function setUp(): void
    {
        $this->solarSystems = new InMemorySolarSystems;

        $this->handler = new DiscoverPlanetHandler(
            $this->solarSystems
        );
    }

	public function test_Handler_can_discover_planets(): void
    {
        $solarSystemId  = SolarSystemId::generate();
        $starId         = StarId::generate();
        $starMass       = new Mass(1.989E+30);
        $hzInnerEdge    = new AstronomicalUnit(1);
        $hzOuterEdge    = new AstronomicalUnit(10);
        $hzRange        = new Range(
            $hzInnerEdge,
            $hzOuterEdge
        );
        $habitableZone = new HabitableZone($hzRange);

        $solarSystem = new SolarSystem(
            $solarSystemId,
            new Star(
                $starId,
                'Sun',
                new Radius(100000),
                $starMass
            ),
            $habitableZone
        );

        $this->solarSystems->add($solarSystem);

        $this->assertAttributeCount(0, 'planets', $solarSystem);

        $command = new DiscoverPlanet(
            PlanetId::generate(),
            'Planet8',
            new AstronomicalUnit(999),
            new Mass(3E+26),
            $solarSystemId
        );

        $this->handler->handle($command);

        $this->assertAttributeCount(1, 'planets', $solarSystem);
    }
}
