<?php

namespace SolarSystem\Domain;

interface HasWeight
{
    public function calculateMass(): Mass;
}