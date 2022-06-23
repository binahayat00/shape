<?php

namespace App\DTO;

class Triangle extends Shape
{
    
    private ?float $side1;

    private ?float $side2;

    private ?float $side3;

        /**
     * @return int|float|null
     */
    public function getSide1(): ?float
    {
        return $this->side1;
    }

    /**
     * @return int|float|null
     */
    public function getSide2(): ?float
    {
        return $this->side2;
    }

    /**
     * @return int|float|null
     */
    public function getSide3(): ?float
    {
        return $this->side3;
    }

    /**
     * @param int|float|null $side1
     */
    public function setSide1(?float $side1): void
    {
        $this->side1 = $side1;
    }

    /**
     * @param int|float|null $side2
     */
    public function setSide2(?float $side2): void
    {
        $this->side2 = $side2;
    }

    /**
     * @param int|float|null $side3
     */
    public function setSide3(?float $side3): void
    {
        $this->side3 = $side3;
    }
    
}
