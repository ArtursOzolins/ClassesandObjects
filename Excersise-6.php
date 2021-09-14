<?php

class DrinkCalc
{
    private $amount;

    public function __construct($amount)
    {

        $this->amount = $amount;
    }

    public function partOf(int $percent): int
    {
        return $this->amount / 100 * $percent;
    }
}

$recentSale = new DrinkCalc(12467);
echo "People who have bought one or more energy drinks per week: {$recentSale->partOf(14)}" . PHP_EOL;
echo "People who prefer citrus flavoured drinks: {$recentSale->partOf(64)}" . PHP_EOL;


