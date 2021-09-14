<?php

class Product
{
    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }
    public function getProduct()
    {
        //Banana, price 1.1, amount 13
        echo "{$this->name}, price {$this->startPrice}, amount {$this->amount}";
    }
    /*
 *
    possibility to change quantity
    possibility to change price

 */
    public function setAmount($newAmount)
    {
        $this->amount = $newAmount;
    }
    public function setStartPrice($newPrice)
    {
        $this->startPrice = $newPrice;
    }
}
/*
 *
    "Logitech mouse", 70.00 EUR, 14 units
    "iPhone 5s", 999.99 EUR, 3 units
    "Epson EB-U05", 440.46 EUR, 1 units

 */

$productList =
    [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1)
    ];

foreach ($productList as $product)
{
    echo "{$product->name}, {$product->startPrice}, {$product->amount}" . PHP_EOL;
}

$productList[0]->setAmount(15);
$productList[1]->setStartPrice(800.50);

foreach ($productList as $product)
{
    echo "{$product->name}, {$product->startPrice}, {$product->amount}" . PHP_EOL;
}
