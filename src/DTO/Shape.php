<?php

namespace App\DTO;

class Shape implements ShapeInterface{

    private ?string $type;

    private ?float $surface;

    private ?float $diameter;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int|float|null
     */
    public function getSurface(): ?float
    {
        return $this->surface;
    }

    /**
     * @return int|float|null
     */
    public function getDiameter(): ?float
    {
        return $this->diameter;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param int|float|null $surface
     */
    public function setSurface(?float $surface): void
    {
        $this->surface = $surface;
    }

    /**
     * @param int|float|null $diameter
     */
    public function setDiameter(?float $diameter): void
    {
        $this->diameter = $diameter;
    }

}