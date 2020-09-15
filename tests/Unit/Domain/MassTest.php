<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;

class MassTest extends TestCase
{
	public function test_mass_can_be_added_to_another_mass()
	{
        $earthMass      = new Mass(5.97E+24);
        $neptuneMass    = new Mass(1.02E+26);

        $totalMass      = $earthMass->add($neptuneMass);

        $this->assertAttributeEquals(5.97E+24, 'value', $earthMass);
        $this->assertAttributeEquals(1.02E+26, 'value', $neptuneMass);

        $this->assertAttributeEquals(1.0797E+26, 'value', $totalMass);

        $this->assertNotSame($earthMass, $totalMass);
        $this->assertNotSame($neptuneMass, $totalMass);

        $this->assertInstanceOf(Mass::class, $totalMass);
    }

    public function test_mass_can_calculate_the_sum_of_masses()
    {
        $light = new Mass(1);
        $heavy = new Mass(100);

        $sum = Mass::sum($light, $heavy);

        $this->assertAttributeEquals(101, 'value', $sum);
    }
}
