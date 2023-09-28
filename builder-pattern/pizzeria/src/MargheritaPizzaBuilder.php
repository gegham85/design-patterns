<?php

namespace src;

class MargheritaPizzaBuilder implements PizzaBuilder
{
    private $pizza;

    public function __construct()
    {
        $this->pizza = new Pizza();
    }

    public function setSize($size)
    {
        $this->pizza->setSize($size);
    }

    public function addCheese()
    {
        $this->pizza->addCheese();
    }

    public function addPepperoni()
    {
        // Margherita pizza does not have pepperoni
    }

    public function addMushrooms()
    {
        // Margherita pizza does not have mushrooms
    }

    public function build()
    {
        return $this->pizza;
    }
}
