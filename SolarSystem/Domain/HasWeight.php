<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

interface HasWeight
{
    public function calculateMass(): Mass;
}
