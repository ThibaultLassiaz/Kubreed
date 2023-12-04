<?php

namespace App\Controller;

use App\Service\ComputationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ApiController extends AbstractController
{
    private ComputationService $service;

    public function __construct(ComputationService $service)
    {
        $this->service = $service;
    }

    #[Route('/', name: 'index')]
    public function computeCombinations(Request $request): Response
    {
        $input1 = [];
        $input2 = [];

        return new JsonResponse($this->service->generateCombinations($input1, $input2), 200);
    }
}
