<?php

interface Strategy
{
    public function execute($a, $b);
}

class ConcreteStrategyAdd implements Strategy
{
    public function execute($a, $b)
    {
        echo $a + $b . "\n";
    }
}

class ConcreteStrategySubtract implements Strategy
{
    public function execute($a, $b)
    {
        echo $a - $b . "\n";
    }
}

class ConcreteStrategyMultiply implements Strategy
{
    public function execute($a, $b)
    {
        echo $a * $b . "\n";
    }
}

class Context
{
    protected $strategy = null;

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy($a, $b)
    {
        $this->strategy->execute($a, $b);
    }
}

$context = new Context();

$context->setStrategy(new ConcreteStrategyAdd());
$context->executeStrategy(2, 4);

$context->setStrategy(new ConcreteStrategyMultiply());
$context->executeStrategy(2, 4);

