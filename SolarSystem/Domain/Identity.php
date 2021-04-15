<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\UuidInterface;

abstract class Identity
{
    private UuidInterface $value;

    public function __construct($value)
    {
        $this->value = UuidV4::fromString((string)$value);
    }

    public static function generate(): Identity
    {
        return new static(UuidV4::uuid4());
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
