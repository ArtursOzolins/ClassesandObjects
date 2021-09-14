<?php

class Date
{

    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {

        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    private function getMonth(): int
    {
        return $this->month;
    }

    private function getDay(): int
    {
        return $this->day;
    }

    private function getYear(): int
    {
        return $this->year;
    }

    public function setMonth(int $amount): void
    {
        $this->month = $amount;
    }

    public function setDay(int $amount): void
    {
        $this->day = $amount;
    }

    public function setYear(int $amount): void
    {
        $this->year = $amount;
    }

    public function displayDate()
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}";
    }
}

$randomDate = new Date(07, 10, 1994);
echo $randomDate->displayDate() . PHP_EOL;

function DateTest ($yourDate)
{
    for ($i = 0; $i < 5; $i++)
    {
    $yourDate->setMonth(rand(1,12));
    $yourDate->setDay(rand(1,28));
    $yourDate->setYear(rand(1990,2021));
    echo $yourDate->displayDate() . PHP_EOL;
    }
}

Datetest($randomDate);
