<?php

namespace App\Services;

use App\DTO\Circle;
use App\DTO\Triangle;

class MathService
{
    protected $circleService,$triangleService;
    public function __construct()
    {
        $this->circle = new Circle();
        $this->triangle = new Triangle();
    }

    public function createServicesObject(){
        $data = [
            'side1' => 2,
            'side2' => 2,
            'side3' => 2,
            'radius' => 2,
        ];
        $this->triangleService = new TriangleService($data['side1'], $data['side2'], $data['side3']);
        $this->circleService = new CircleService($data['radius']);
    }

    public function sumSurfaces()
    {
        $this->createServicesObject();
        $this->triangle->setSurface($this->triangleService->calculateSurface());
        $this->circle->setSurface($this->circleService->calculateSurface());
        return [
            'data' => $this->sumSurfacesObject($this->circle ,$this->triangle),
            'status'=>200
        ];
    }

    public static function sumSurfacesObject(Circle $circle, Triangle $triangle)
    {
        return $circle->getSurface() + $triangle->getSurface();
    }

    public function sumDiameters()
    {
        $this->createServicesObject();
        $this->triangle->setDiameter($this->triangleService->calculateDiameter());
        $this->circle->setDiameter($this->circleService->calculateDiameter());
        return [
            'data' => $this->sumDiametersObject($this->circle ,$this->triangle),
            'status'=>200
        ];
    }

    public static function sumDiametersObject(Circle $circle, Triangle $triangle)
    {
        return $circle->getDiameter() + $triangle->getDiameter();
    }
}
