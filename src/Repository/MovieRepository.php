<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;
use PDO;

class MovieRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM movie';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    //array de Movie si en objet
    public function findAll(): array
    {
        return $this->PDOService->getPdo()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    //array de Movie si en objet
    public function findByTitle(string $title): array
    {
        $query = $this->PDOService->getPdo()->prepare('SELECT * FROM movie WHERE title LIKE :title');

        $like = '%' . $title . '%';

        $query->bindParam(':title', $like);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    //Movie si en objet
    public function insertMovie(Movie|array $movie): Movie|array
    {
        $query = $this->PDOService->getPdo()->prepare('INSERT INTO movie Value (NULL, :title, :releaseDate)');

        $title = $movie->getTitle();
        $date = $movie->getReleaseDate();

        $releaseDate = $date->format('Y-m-d');

        $query->bindParam(':title', $title);
        $query->bindParam(':releaseDate', $releaseDate);
        $query->execute();

        return $movie;
    }
}
