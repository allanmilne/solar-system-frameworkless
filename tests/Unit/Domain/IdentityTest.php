<?php

namespace Unit\Domain;

use PHPUnit\Framework\TestCase;

class IdentityTest extends TestCase
{
	public function test_can_hydrate_from_existing_value()
	{
		$id = new class("44260076-3856-46ed-88d5-9946c093e6d7") extends Identity {};

		$this->assertInstanceOf(Identity::class, $id);
		$this->assertEquals("44260076-3856-46ed-88d5-9946c093e6d7", (string) $id);
	}

	public function test_it_must_be_of_valid_uuid_4_format()
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Invalid UUID string: monkey');

		new class("monkey") extends Identity {};
	}
}
