<?php

namespace SolarSystem\Domain;

final class AstronomicalUnit
{
	private $distance;

	public function __construct(float $distance)
	{
		if ($distance < 0) {
			throw new InvalidDistance;
		}

		$this->distance = $distance;
	}

	public function getDistance(): float
    {
		return $this->distance;
	}
}
