<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;

class AstronomicalUnitTest extends TestCase
{
	public function test_an_astronomical_unit_can_not_be_negative(): void
	{
		$this->expectException(InvalidDistance::class);

		new AstronomicalUnit(-1.000);
	}
}
