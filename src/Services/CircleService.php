<?php

namespace App\Services;

use App\DTO\Circle;

class CircleService
{
    const TYPE = 'circle';
    const PI = M_PI;

    protected $radius, $circle, $serializeService;
    public function __construct(int|float $radius)
    {
        $this->radius = $radius;
        $this->serializeService = new SerializeService();
        $this->circle = new Circle();
        $this->circle->setType(self::TYPE);
        $this->circle->setRadius($this->radius);
    }

    public function calculateSurface(): float|int
    {
        return self::PI * ($this->radius ** 2);
    }

    public function calculateDiameter(): float|int
    {
        return $this->radius * 2;
    }
    
    public function getProperties()
    {
        $this->circle->setSurface($this->calculateSurface());
        $this->circle->setDiameter($this->calculateDiameter());
        return [
            'data' => $this->serializeService->objectToJson($this->circle),
            'status'=>200
        ];
    }
}
