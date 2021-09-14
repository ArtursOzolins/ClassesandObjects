<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    function show_user_name_and_balance(): string
    {
        $dollarSign = '$';
        $resultString = '';
        if ($this->balance < 0)
            {
                $toPositive = abs($this->balance);
                $toPositive = (string)$toPositive;
                $resultString = "{$this->name}, -{$dollarSign}{$toPositive}";
            } else {
                $this->balance = (string)$this->balance;
                $resultString = "{$this->name}, {$dollarSign}{$this->balance}";
            }
        return $resultString;
    }
}

$ben = new BankAccount('Benson', 17.25);

echo $ben->show_user_name_and_balance();