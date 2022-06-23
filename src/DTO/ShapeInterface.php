<?php

namespace App\DTO;

interface ShapeInterface
{

    /**
     * @return string|null
     */
    public function getType(): ?string;

    /**
     * @return int|float|null
     */
    public function getSurface(): ?float;

    /**
     * @return int|float|null
     */
    public function getDiameter(): ?float;

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void;
    /**
     * @param int|float|null $side1
     */

    /**
     * @param int|float|null $surface
     */
    public function setSurface(?float $surface): void;

    /**
     * @param int|float|null $diameter
     */
    public function setDiameter(?float $diameter): void;

}