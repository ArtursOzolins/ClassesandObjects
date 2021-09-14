<?php

class SavingsAccount
{
    protected float $balance;
    protected float $interestRate; //percent
    protected float $totalDeposited = 0;
    protected float $totalWithdrawn = 0;
    protected float $totalInterest = 0;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function withDraw($amount): void
    {
        $this->totalWithdrawn += $amount;
        $this->balance -= $amount;
    }

    public function deposit($amount): void
    {
        $this->totalDeposited += $amount;
        $this->balance += $amount;
    }

    public function addMonthlyInterest(): void
    {
        $amount = ($this->interestRate / 100 * $this->balance) / 12;
        $this->balance += $amount;
        $this->totalInterest += $amount;
    }
}

class Test extends SavingsAccount
{
    public function balanceCalc()
    {
        echo "How much money is in the account?: {$this->balance}" . PHP_EOL;
        $this->interestRate = (float)readline('Enter the annual interest rate: ');
        $months = (int)readline('How long has the account been opened? ');
        for ($i = 1; $i <= $months; $i++) {
            $deposited = (float)readline("Enter amount deposited for month: {$i}: ");
            $this->deposit($deposited);
            $withdrawed = (float)readline("Enter amount withdrawn for {$i}: ");
            $this->withDraw($withdrawed);
            $this->addMonthlyInterest();
        }
        echo "Ending balance: {$this->getBalance()}$" . PHP_EOL;
        echo "Total deposited: {$this->totalDeposited}$" . PHP_EOL;
        echo "Total withdrawn: {$this->totalWithdrawn}$" . PHP_EOL;
        echo "Interest earned: {$this->totalInterest}$" . PHP_EOL;
    }
}

$user = new Test(10000);
$user->balanceCalc();
