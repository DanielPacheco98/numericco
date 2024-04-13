<?php

namespace App\Animals\Domain;

class Animal {

    private array $facts;

    public function __construct(
        private string $identifier,
        private string $breed,
        private float  $maxLife
    ) {
        $this->facts = [];
    }

    public function getIdentifier(): string {
        return $this->identifier;
    }

    public function getMaxLife(): float {
        return $this->maxLife;
    }

    public function setMaxLife(float $maxLife): void {
        $this->maxLife = $maxLife;
    }

    public function getFacts(): array {
        return $this->facts;
    }

    public function setFacts(array $facts): void {
        $this->facts = $facts;
    }

    public function getBreed(): string {
        return $this->breed;
    }
}