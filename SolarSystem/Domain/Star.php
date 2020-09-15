<?php

namespace SolarSystem\Domain;

final class Star implements HasWeight
{
    private $id;

    private $name;
    
    private $size;
    
    private $mass;

    public function __construct(StarId $id, string $name, Radius $size, Mass $mass)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->size = $size;
        $this->mass = $mass;
    }

    public function getId(): StarId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): Radius
    {
        return $this->size;
    }

    public function calculateMass(): Mass
    {
        return $this->mass;
    }
}
