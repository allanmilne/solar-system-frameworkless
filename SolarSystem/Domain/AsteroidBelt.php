<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class AsteroidBelt implements HasWeight
{
    private AsteroidBeltId $id;

    private Range $range;

    private Mass $mass;

    public function __construct($id, Range $range, Mass $mass)
    {
        $this->id = $id;
        $this->range = $range;
        $this->mass = $mass;
    }

    public function getId(): AsteroidBeltId
    {
        return $this->id;
    }

    public function calculateMass(): Mass
    {
        return $this->mass;
    }
}
