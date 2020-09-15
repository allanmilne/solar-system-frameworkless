<?php

namespace SolarSystem\Domain;

final class Moon implements HasWeight
{
    private $id;

    private $name;
    
    private $distance;
    
    private $mass;

    public function __construct(MoonId $id, string $name, AstronomicalUnit $distance, Mass $mass)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->distance = $distance;
        $this->mass     = $mass;
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