<?php

namespace App\Services;

use App\DTO\Triangle;

class TriangleService
{
    const TYPE = 'triangle';

    protected $side1, $side2, $side3, $surface, $diameter, $triangle, $serializeService;
    public function __construct(int|float $side1, int|float $side2, int|float $side3)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->serializeService = new SerializeService();
        $this->triangle = new Triangle();
        $this->triangle->setType(self::TYPE);
        $this->triangle->setSide1($this->side1);
        $this->triangle->setSide2($this->side2);
        $this->triangle->setSide3($this->side3);
    }

    public function calculateSurface(): float|int
    {
        $halfDiameter = ($this->side1 + $this->side2 + $this->side3) / 2;
        return sqrt($halfDiameter * ($halfDiameter - $this->side1) * ($halfDiameter - $this->side2) * ($halfDiameter - $this->side3));
    }

    public function calculateDiameter(): float|int
    {
        return ($this->side1 * $this->side2 * $this->side3)/(2 * $this->calculateSurface());
    }

    public function checkEveryTwoNumbersBigerThanAnother(): bool
    {
        return (($this->side1 + $this->side2 > $this->side3) && ($this->side1 + $this->side3 > $this->side2) && ($this->side2 + $this->side3 > $this->side1)) ? true : false;
    }

    public function isTriangle(): bool
    {
        return $this->checkEveryTwoNumbersBigerThanAnother();
    }

    public function getProperties()
    {
        if($this->isTriangle() == false){
            return [
                'data' => null,
                'status'=>400
            ];
        }
        else{
            $this->triangle->setDiameter($this->calculateDiameter());
            $this->triangle->setSurface($this->calculateSurface());
            return [
                'data' => $this->serializeService->objectToJson($this->triangle),
                'status'=>200
            ];
        }
    }
}
