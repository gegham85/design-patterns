<?php

class SingletonObject
{
    private static $obj;

    private $secretNumber = 1;

    public static function getInstance()
    {
        if (!self::$obj) {
            self::$obj = new SingletonObject();
        }

        return self::$obj;
    }

    public function getSecretNumber()
    {
        var_dump($this->secretNumber);
    }

    public function increment()
    {
        $this->secretNumber++;
    }
}

$singleton = SingletonObject::getInstance();

$singleton->getSecretNumber(); // 1
$singleton->increment();
$singleton->getSecretNumber(); // 2

$singleton = SingletonObject::getInstance();
$singleton->getSecretNumber(); // 2