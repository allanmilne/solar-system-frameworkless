<?php

namespace SolarSystem\Domain;

final class Mass
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function sum(Mass ...$masses): Mass
    {
        $total = new Mass(0);

        foreach ($masses as $mass) {
            $total = $total->add($mass);
        }

        return $total;
    }

    public function add($value)
    {
        return new Mass($this->value + $value->value);
    }
}
