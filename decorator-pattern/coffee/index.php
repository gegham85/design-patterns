<?php

interface Coffee
{
    public function getCost(): float;
    public function getIngredients(): string;
}

class SimpleCoffee implements Coffee
{
    public function getCost(): float
    {
        return 2.0;
    }

    public function getIngredients(): string
    {
        return "Coffee";
    }
}

abstract class CoffeeDecorator implements Coffee
{
    protected Coffee $decoratedCoffee;

    public function __construct(Coffee $coffee)
    {
        $this->decoratedCoffee = $coffee;
    }

    public function getCost(): float
    {
        return $this->decoratedCoffee->getCost();
    }

    public function getIngredients(): string
    {
        return $this->decoratedCoffee->getIngredients();
    }
}

class MilkDecorator extends CoffeeDecorator
{
    public function getCost(): float
    {
        return parent::getCost() + 0.5;
    }

    public function getIngredients(): string
    {
        return parent::getIngredients() . ", Milk";
    }
}

class SugarDecorator extends CoffeeDecorator
{
    public function getCost(): float
    {
        return parent::getCost() + 0.25;
    }

    public function getIngredients(): string
    {
        return parent::getIngredients() . ", Sugar";
    }
}

// --------------------------------------------------------

// A simple coffee
$myCoffee = new SimpleCoffee();
echo "Cost: " . $myCoffee->getCost() . ", Ingredients: " . $myCoffee->getIngredients() . "\n";
// Output: Cost: 2, Ingredients: Coffee

// Coffee with milk
$myCoffee = new MilkDecorator(new SimpleCoffee());
echo "Cost: " . $myCoffee->getCost() . ", Ingredients: " . $myCoffee->getIngredients() . "\n";
// Output: Cost: 2.5, Ingredients: Coffee, Milk

// Coffee with milk and sugar
$myCoffee = new SugarDecorator(new MilkDecorator(new SimpleCoffee()));
echo "Cost: " . $myCoffee->getCost() . ", Ingredients: " . $myCoffee->getIngredients() . "\n";
// Output: Cost: 2.75, Ingredients: Coffee, Milk, Sugar