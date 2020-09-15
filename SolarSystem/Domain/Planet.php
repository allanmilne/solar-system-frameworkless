<?php

namespace SolarSystem\Domain;

final class Planet implements HasWeight
{
    private $id;

    private $name;

    private $distance;

    private $mass;

    private $moons = [];

    public function __construct(PlanetId $id, string $name, AstronomicalUnit $distance, Mass $mass)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->distance = $distance;
        $this->mass     = $mass;
    }

    public function getId(): PlanetId
	{
		return $this->id;
	}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDistance(): AstronomicalUnit
    {
        return $this->distance;
    }

    public function getMass(): Mass
    {
        return $this->mass;
    }

    public function discoverMoon(MoonId $moonId, string $name, AstronomicalUnit $distFromPlanet, Mass $mass): void
    {
        $newMoon = new Moon(
            $moonId,
            $name,
            $distFromPlanet,
            $mass
        );

        $this->moons[(string) $moonId] = $newMoon;
    }

    public function getTotalMassOfMoons(): Mass
    {
        $moonMasses = [];

        foreach ($this->moons as $moon)
        {
            $moonMasses[] = $moon->calculateMass();
        }

        return Mass::sum(...$moonMasses);
    }


    public function calculateMass(): Mass
    {
        return Mass::sum(
            $this->mass,
            $this->getTotalMassOfMoons()
        );
    }
}
