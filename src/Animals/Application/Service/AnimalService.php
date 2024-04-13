<?php

namespace App\Animals\Application\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AnimalService {

    private Client $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://dogapi.dog/docs/api-v2'
        ]);
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    private function getBreedIdentifiers(): array {
        $response = $this->client->get('/breeds');

        $breedsData = json_decode($response->getBody()->getContents(), true);

        $identifiers = [];

        foreach ($breedsData as $breed) {
            $identifiers[] = $breed['id'];
        }

        return $identifiers;
    }

    /**
     * @param string $identifier
     * @return array
     * @throws GuzzleException
     */
    private function getBreedInfo(string $identifier): array {

        $response = $this->client->get('/breeds/'. $identifier);

        $breedData = json_decode($response->getBody()->getContents(), true);

        return $breedData['attributes'];
    }

    /**
     * @param float $minLife
     * @return array
     * @throws GuzzleException
     */
    public function getBreedsByMinLife(float $minLife = 10): array {

        $result = [];

        $breedIdentifiers = $this->getBreedIdentifiers();

        foreach ($breedIdentifiers as $breedIdentifier) {
            $breedInfo = $this->getBreedInfo($breedIdentifier);
            if ($breedInfo['min_life'] >= $minLife) {
                $result[$breedIdentifier] = $breedInfo;
            }
        }

        return $result;
    }
}