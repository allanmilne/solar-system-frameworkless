<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class Star implements HasWeight
{
    private StarId $id;

    private string $name;

    private Radius $size;

    private Mass $mass;

    public function __construct($id, string $name, Radius $size, Mass $mass)
    {
        $this->id = $id;
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
