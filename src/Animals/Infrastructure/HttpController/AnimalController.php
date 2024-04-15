<?php

namespace App\Animals\Infrastructure\HttpController;
use App\Animals\Application\Service\AnimalService;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController {
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws GuzzleException
     */
    #[Route('/animals', name: 'animals', methods: ['GET'])]
    public function getAnimalsByMinLife(Request $request): JsonResponse {

        $service = new AnimalService();

        $breadsData = $service->getBreedsByMinLife();

        return new JsonResponse($breadsData, Response::HTTP_OK);
    }
}