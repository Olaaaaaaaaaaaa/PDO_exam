<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Models\Actor;
use App\Repository\ActorRepository;

var_dump($_POST);
$actorRepository = new ActorRepository();

if (isset($_POST['first-name']) && isset($_POST['last-name'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $actor = new Actor();
    $actor->setFirstName($firstName);
    $actor->setLastName($lastName);

    $actorRepository->insertActor($actor);
}

header('location:index.php');
exit;
