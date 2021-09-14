<?php

class Account
{
    private string $accountName;
    private int $balance;

    public function __construct(string $accountName, int $balance)
    {
        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    public function getAccountName(): string
    {
        return $this->accountName;
    }

    public function balance(): int
    {
        return $this->balance;
    }

    public function withdrawal(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }

    public function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);

    }
}

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartos_account->balance() . PHP_EOL;
echo $bartos_swiss_account->balance() . PHP_EOL;

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->balance() . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartos_account->balance() . PHP_EOL;
echo $bartos_swiss_account->balance() . PHP_EOL;


class Test
{
    public function __construct()
    {
        $user1 = new Account("Matt's account", 1000);
        $user2 = new Account("My account", 0);
        $user1->withdrawal(100);
        $user2->deposit(100);
        echo "{$user1->getAccountName()} account balance is now: {$user1->balance()}" . PHP_EOL;
        echo "{$user2->getAccountName()} account balance is now: {$user2->balance()}" . PHP_EOL;

    }
}

$firstTranfer = new Test;

$a = new Account('A', 100);
$b = new Account('B', 0.0);
$c = new Account('C', 0.0);

$a->transfer($a,$b,50);
$b->transfer($b,$c,25);

var_dump($a->balance());
var_dump($b->balance());
var_dump($c->balance());