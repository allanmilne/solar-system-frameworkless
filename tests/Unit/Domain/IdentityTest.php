<?php

namespace Unit\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SolarSystem\Domain\Identity;

class IdentityTest extends TestCase
{
	public function test_can_hydrate_from_existing_value(): void
    {
		$id = new class("44260076-3856-46ed-88d5-9946c093e6d7") extends Identity {};

		self::assertInstanceOf(Identity::class, $id);
		self::assertEquals("44260076-3856-46ed-88d5-9946c093e6d7", (string) $id);
	}

	public function test_it_must_be_of_valid_uuid_4_format(): void
    {
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('Invalid UUID string: monkey');

		new class("monkey") extends Identity {};
	}
}
