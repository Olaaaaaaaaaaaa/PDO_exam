<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Models\Movie;
use App\Repository\MovieRepository;

var_dump($_POST);
$movieRepository = new MovieRepository();

if (isset($_POST['title']) && isset($_POST['releaseDate'])) {
    $title = $_POST['title'];
    $date = $_POST['releaseDate'];
    $date = new DateTime($date);
    $releaseDate = $date->format('Y-m-d');
    $movie = new Movie();
    $movie->setTitle($title);
    $movie->setRelease_date($releaseDate);

    $movieRepository->insertMovie($movie);
}

header('location:index.php');
exit;
