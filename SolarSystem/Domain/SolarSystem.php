<?php
declare(strict_types=1);

namespace SolarSystem\Domain;


final class SolarSystem implements HasWeight
{
    private SolarSystemId $id;

    private Star $star;

    private HabitableZone $habitableZoneArea;

    private array $planets = [];

    private array $asteroidBelts = [];

    public function __construct($id, Star $star, HabitableZone $habitableZoneArea)
    {
        $this->id = $id;
        $this->star = $star;
        $this->habitableZoneArea = $habitableZoneArea;
    }

    public function getId(): SolarSystemId
    {
        return $this->id;
    }

    public function discoverPlanet(PlanetId $planetId, string $planetName, AstronomicalUnit $distance, Mass $mass): void
    {
        $this->detectPlanetClash($distance);
        $this->detectAsteroidBeltOverlap($distance);

        $newPlanet = new Planet(
            $planetId,
            $planetName,
            $distance,
            $mass
        );

        $this->planets[(string)$planetId] = $newPlanet;
    }

    private function detectPlanetClash(AstronomicalUnit $distance): void
    {
        foreach ($this->planets as $planet) {
            if ($distance->getDistance() === $planet->getDistance()->getDistance()) {
                throw new CollisionImminent ('Collision alert, cannot add Planet with same distance as another Planet!');
            }
        }
    }

    private function detectAsteroidBeltOverlap(AstronomicalUnit $distance): void
    {
        foreach ($this->asteroidBelts as $asteroidBelt) {
            if ($asteroidBelt->range->withinRange($distance)) {
                throw new CollisionImminent ('Collision alert, Planet is within Asteroid Belt!');
            }
        }
    }

    public function removePlanet(PlanetId $planetId): void
    {
        unset($this->planets[(string)$planetId]);
    }

    public function discoverAsteroidBelt(AsteroidBeltId $asteroidBeltId, Range $range, Mass $mass): void
    {
        $this->detectPlanetOverlap($range);

        $newAsteroidBelt = new AsteroidBelt(
            $asteroidBeltId,
            $range,
            $mass
        );

        $this->asteroidBelts[(string)$asteroidBeltId] = $newAsteroidBelt;
    }

    private function detectPlanetOverlap(Range $range): void
    {
        foreach ($this->planets as $planet) {
            if ($range->withinRange($planet->getDistance())) {
                throw new CollisionImminent ('Collision alert, Planet is within Asteroid Belt range!');
            }
        }
    }

    public function calculateMass(): Mass
    {
        $masses = [
            $this->star->calculateMass()
        ];
        foreach ($this->planets as $planet) {
            $masses[] = $planet->calculateMass();
        }
        foreach ($this->asteroidBelts as $asteroidBelt) {
            $masses[] = $asteroidBelt->calculateMass();
        }

        return Mass::sum(...$masses);
    }

    public function withinHabitableZone(AstronomicalUnit $distance): bool
    {
        return $this->habitableZoneArea->withinZone($distance);
    }
}
