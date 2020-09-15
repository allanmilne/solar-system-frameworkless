<?php

namespace SolarSystem\Domain;

final class AsteroidBelt implements HasWeight
{
    private $id;

    private $mass;
    /**
     * @var Range
     */
    private $range;

    public function __construct(AsteroidBeltId $id, Range $range, Mass $mass)
    {
        $this->id       = $id;
        $this->range    = $range;
        $this->mass     = $mass;
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
