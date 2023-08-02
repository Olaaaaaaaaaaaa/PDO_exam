<?php

namespace App\Models;

use DateTime;

class Movie
{
    private int $id;

    private string $title;

    private $release_date;

    private array $actors = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @throws \Exception
     */
    public function getReleaseDate(): DateTime
    {
        return (!$this->release_date instanceof DateTime) ? new DateTime($this->release_date) : $this->release_date;
    }

    public function setRelease_date($release_date): void
    {
        $this->release_date = new DateTime($release_date);
    }

    public function getActors(): array
    {
        return $this->actors;
    }

    public function setActors(array $actors): void
    {
        $this->actors = $actors;
    }

    public function addActor(Actor $actor): void
    {
        $this->actors[] = $actor;
    }

    public function removeActor(Actor $actor): void
    {
        if (($key = array_search($actor, $this->actors)) !== false) {
            unset($this->actors[$key]);
        }
    }

    public function __toString(): string
    {
        return $this->getTitle();
    }
}
