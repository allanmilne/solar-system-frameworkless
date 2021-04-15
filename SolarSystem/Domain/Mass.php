<?php
declare(strict_types=1);

namespace SolarSystem\Domain;

use JetBrains\PhpStorm\Pure;

final class Mass
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    #[Pure] public static function sum(Mass ...$masses): Mass
    {
        $total = new Mass(0);

        foreach ($masses as $mass) {
            $total = $total->add($mass->getValue());
        }

        return $total;
    }

    #[Pure] public function add($value): Mass
    {
        return new Mass($this->value + $value);
    }
}
