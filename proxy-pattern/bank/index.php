<?php

interface BankAccount
{
    public function deposit(int $amount);

    public function getBalance(): int;
}

class HeavyBankAccount implements BankAccount
{
    private $transactions = [];

    public function deposit(int $amount)
    {
        $this->transactions[] = $amount;
    }

    public function getBalance(): int
    {
        return (int) array_sum($this->transactions);
    }
}

class BankAccountProxy extends HeavyBankAccount implements BankAccount
{
    private $balance = null;

    public function getBalance(): int
    {
        // because calculating balance is so expensive,
        // the usage of BankAccount::getBalance() is delayed until it really is needed
        // and will not be calculated again for this instance

        if ($this->balance === null) {
            $this->balance = parent::getBalance();
        }

        return $this->balance;
    }
}

// ============== usage ==============

$bankAccount = new BankAccountProxy();
$bankAccount->deposit(30);

// this time balance is being calculated
echo $bankAccount->getBalance() . "\n";

// inheritance allows for BankAccountProxy to behave to an outsider exactly like ServerBankAccount
$bankAccount->deposit(50);

// this time the previously calculated balance is returned again without re-calculating it
echo $bankAccount->getBalance() . "\n";