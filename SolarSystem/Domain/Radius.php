<?php

namespace SolarSystem\Domain;

final class Radius
{
    private $size;

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
