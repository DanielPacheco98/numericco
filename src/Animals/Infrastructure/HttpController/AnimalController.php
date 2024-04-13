<?php

namespace App\Animals\Infrastructure\HttpController;
use App\Animals\Application\Service\AnimalService;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animals")
 */
class AnimalController {

    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("", methods={"GET"})
     * @throws GuzzleException
     */
    public function getAnimalsByMinLife(Request $request): JsonResponse {

        $service = new AnimalService();

        $breadsData = $service->getBreedsByMinLife();

        return new JsonResponse($breadsData, Response::HTTP_OK);
    }
}