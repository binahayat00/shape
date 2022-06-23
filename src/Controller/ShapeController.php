<?php

namespace App\Controller;

use App\Services\CircleService;
use App\Services\MathService;
use App\Services\SerializeService;
use App\Services\TriangleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ShapeController extends AbstractController
{
    public $type, $side1, $side2, $side3, $triangleService, $circleService, $serializeService, $mathService;
    public function __construct()
    {
        $this->serializeService = new SerializeService();
        $this->mathService = new MathService();
    }

    #[Route('/triangle/{side1}/{side2}/{side3}', name: 'triangleProperties')]
    public function triangleProperties(int|float $side1, int|float $side2, int|float $side3): JsonResponse
    {
        $this->triangleService = new TriangleService($side1, $side2, $side3);
        $properties = $this->triangleService->getProperties();
        return new JsonResponse($properties['data'],$properties['status']);
    }

    #[Route('/circle/{radius}', name: 'circleProperties')]
    public function circleProperties(int|float $radius): JsonResponse
    {
        $this->circleService = new CircleService($radius);
        $properties = $this->circleService->getProperties();
        return new JsonResponse($properties['data'],$properties['status']);
    }

    #[Route('/surface/circle/triangle', name: 'circleAndTriangleSurfaces')]
    public function circleAndTriangleSurfaces(): JsonResponse
    {
        $properties = $this->mathService->sumSurfaces();
        return new JsonResponse($properties['data'],$properties['status']);
    }

    #[Route('/surface/circle/diameter', name: 'circleAndTriangleDiameter')]
    public function circleAndTriangleDiameter(): JsonResponse
    {
        $properties = $this->mathService->sumDiameters();
        return new JsonResponse($properties['data'],$properties['status']);
    }

    #[Route('/', name: 'show')]
    public function show(){
        return $this->render('triangle/index.html.twig');
    }
}
