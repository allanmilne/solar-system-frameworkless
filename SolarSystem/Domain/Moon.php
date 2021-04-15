<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class Moon implements HasWeight
{
    private MoonId $id;

    private string $name;

    private AstronomicalUnit $distance;

    private Mass $mass;

    public function __construct($id, string $name, AstronomicalUnit $distance, Mass $mass)
    {
        $this->id = $id;
        $this->name = $name;
        $this->distance = $distance;
        $this->mass = $mass;
    }

    public function getId(): MoonId
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

    public function calculateMass(): Mass
    {
        return $this->mass;
    }
}
