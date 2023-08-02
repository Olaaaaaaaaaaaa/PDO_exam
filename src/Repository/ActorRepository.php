<?php

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;
use PDO;

class ActorRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM actor';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    //array d'Actor si en objet
    public function findAll(): array
    {
        return $this->PDOService->getPdo()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Actor::class);
    }

    //Actor si en objet
    public function insertActor(Actor|array $actor): Actor|array
    {
        $query = $this->PDOService->getPdo()->prepare('INSERT INTO actor Value (NULL, :firstName, :lastName)');

        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();

        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->execute();

        return $actor;
    }
}
