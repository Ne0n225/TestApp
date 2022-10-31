<?php

namespace App\Models\RepositoryData;

class RepositoryInfoDto
{
    private string $name;
    private string $author;
    private int $stars;
    private int $watchers;
    private string $url;

    public function __construct(string $name, string $author, int $stars, int $watchers, string $url)
    {
        $this->name = $name;
        $this->author = $author;
        $this->stars = $stars;
        $this->watchers = $watchers;
        $this->url = $url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getStars(): int
    {
        return $this->stars;
    }

    public function getWatchers(): int
    {
        return $this->watchers;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
