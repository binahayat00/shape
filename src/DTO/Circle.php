<?php

namespace App\DTO;

class Circle extends Shape
{

    private ?float $radius;

    /**
     * @return int|float|null
     */
    public function getRadius(): ?float
    {
        return $this->radius;
    }

    /**
     * @param int|float|null $side3
     */
    public function setRadius(?float $radius): void
    {
        $this->radius = $radius;
    }
}
