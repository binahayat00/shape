<?php

declare(strict_types=1);

namespace App\Tests\Controllers;

use App\Services\TriangleService;
use App\Controller\ShapeController;
use App\DTO\Circle;
use App\Services\CircleService;
use App\Services\MathService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Services\SerializeService;

class ShapeControllerTest extends KernelTestCase
{
    public function testTriangleProperties()
    {
        $shapeController = new ShapeController();
        $res = $shapeController->triangleProperties(3,4,5);
        return $this->assertEquals($res->getStatusCode(),200);
    }

    public function testCircleProperties()
    {
        $shapeController = new ShapeController();
        $res = $shapeController->circleProperties(2);
        return $this->assertEquals($res->getStatusCode(),200);
    }

    public function testCircleAndTriangleSurfaces()
    {
        $shapeController = new ShapeController();
        $res = $shapeController->circleAndTriangleSurfaces();
        return $this->assertEquals($res->getStatusCode(),200);
    }

    public function testCircleAndTriangleDiameter()
    {
        $shapeController = new ShapeController();
        $res = $shapeController->circleAndTriangleDiameter();
        return $this->assertEquals($res->getStatusCode(),200);
    }
    
}
