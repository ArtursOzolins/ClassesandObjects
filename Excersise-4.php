<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {

        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getTitle()
    {
        return $this->title;
    }

}

/*
 * Write a piece of code that creates an instance of the class Movie:
    - with the title “Casino Royale”, the studio “Eon Productions” and the rating “PG­13”;
    - with the title “Glass”, the studio “Buena Vista International” and the rating “PG­13”;
    - with the title “Spider-Man: Into the Spider-Verse”, the studio “Columbia Pictures” and the rating “PG”.
 */

$movies = [
    new Movie('Casino Royale', 'Eon Productions', 'PG­13'),
    new Movie ('Glass', 'Buena Vista International', 'PG­13'),
    new Movie ('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG')
    ];

function getPG(array $movies): array
{
    $resultArray = [];
    foreach ($movies as $movie)
    {
        if ($movie->getRating() === 'PG')
        {
            array_push($resultArray, $movie->getTitle());
        }
    }
    return $resultArray;
}

var_dump(getPG($movies));
