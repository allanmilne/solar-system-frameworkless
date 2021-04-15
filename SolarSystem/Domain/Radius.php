<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

final class Radius
{
    private int $size;

    public function __construct(int $size)
    {
        if ($size < 0) {
            throw new InvalidRadius;
        }

        $this->size = $size;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
