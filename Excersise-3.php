<?php

class Car
{
    private $fuelGauge;
    private $odometer;

    public function __construct($fuelGauge, $odometer)
    {
        $this->fuelGauge = $fuelGauge;
        $this->odometer = $odometer;
    }

    public function fillUP($literAmount)
    {
        for ($i = 0; $i < $literAmount; $i++)
        {
            $this->fuelGauge->fuelIncrease();
        }
    }

    public function drive($amountInMiles)
    {
        for ($i = 0; $i < $amountInMiles; $i++)
        {
            $this->odometer->addMile();
            if ($this->odometer->getDriven() === 10)
            {
                $this->fuelGauge->fuelDecrease();
                $this->odometer->setDriven();
            }
            echo "Mileage: {$this->odometer->getMileage()}" . PHP_EOL;
            echo "Fuel left: {$this->fuelGauge->getFuelAmount()}" . PHP_EOL;
        }
    }
}

class FuelGauge {

    private int $fuelAmount;

    public function __construct(int $fuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
    }

    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function fuelIncrease(): void
    {
        if ($this->fuelAmount < 70) {
            $this->fuelAmount++;
        } else {
            exit;
        }
    }

    public function fuelDecrease(): void
    {
        if ($this->fuelAmount > 0) {
            $this->fuelAmount--;
        }
    }
}

class Odometer {

    private int $mileage;
    private int $driven;

    public function __construct(int $mileage) {
        $this->mileage = $mileage;
        $this->driven = 0;
    }

    public function getMileage(): int {
        return $this->mileage;
    }

    public function addMile(): void {
        if ($this->mileage === 999999) {
            $this->mileage = 0;
            $this->driven++;
        } else {
            $this->mileage++;
            $this->driven++;
        }
    }

    public function getDriven(): int
    {
        return $this->driven;
    }

    public function setDriven(): void
    {
        $this->driven = 0;
    }
}

$carFuel = new fuelGauge(0);
$carOdo = new Odometer(212000);

$bmw = new Car($carFuel, $carOdo);

$bmw->fillUP(5);
$bmw->drive(40);
