<?php

class Application
{
    private VideoStore $store;
    public function __construct()
    {
        $this->store = new VideoStore();
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies()
    {
        $title = readline('Enter title: ');
        $ratings = explode(' ', readline('Enter rating: '));

        $video = new Video($title, true, $ratings);
        $this->store->add($video);
    }

    private function rentVideo()
    {
        /** @var Video $video  */
        $title = readline('Enter video you are looking for? ');
        $video = $this->store->search($title);

        if ($video == null || $video->getAvailability() === false)
        {
            echo 'No such movie available' . PHP_EOL;
        }

        $video->setAviability(false);
    }

    private function returnVideo()
    {
        $title = readline('Enter title: ');
        $video = $this->store->search($title);

        if ($video == null || $video->getAvailability() === true)
        {
            echo 'No such movie available' . PHP_EOL;
        }
        $video->setAviability(true);
    }

    private function listInventory()
    {
       foreach ($this->store->getVideos() as $video)
       {
           /** @var Video $video  */
           $available = $video->getAvailability() ? "Yes" : "No";
           echo "%% {$video->getTitle()} | {$video->getAverageRatings()} | {$available}" . PHP_EOL;
       }
    }
}

class VideoStore
{
    private array $videos = [];

    public function add(Video $video): void
    {
        array_push($this->videos, $video);
    }
    public function getVideos(): array
    {
        return $this->videos;
    }

    public function search(string $title): ?Video
    {
        foreach ($this->getVideos() as $video)
        {
            if ($video->getTitle() === $title)
            {
                return $video;
            }
        }
        return null;
    }

    public function checkOut(Video $title)
    {

    }
}

class Video
{
    private string $title;
    private string $seenOrNot;
    private array $ratings = [];

    public function __construct(string $title, bool $available, array $ratings = [])
    {
        $this->title = $title;
        $this->available = $available;
        $this->ratings = $ratings;
    }

    public function rate(int $rating): void
    {
        array_push($this->ratings, $rating);
    }
    public function toogleAvailable(bool $availability): void
    {
        $this->available = $availability;
    }
    public function getAvailability(): bool
    {
        return $this->available;
    }
    public function setAviability(bool $bool): void
    {
        $this->available = $bool;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRatings(): array
    {
        return $this->ratings;
    }
    public function getAverageRatings(): float
    {
        return array_sum($this->ratings) / count($this->ratings);
    }
}

$app = new Application();
$app->run();

$bestStore = new VideoStore();
