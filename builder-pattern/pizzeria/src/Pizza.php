<?php

namespace src;

class Pizza
{
    private $size;
    private $cheese = false;
    private $pepperoni = false;
    private $mushrooms = false;

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function addCheese()
    {
        $this->cheese = true;
    }

    public function addPepperoni()
    {
        $this->pepperoni = true;
    }

    public function addMushrooms()
    {
        $this->mushrooms = true;
    }

    public function getDescription()
    {
        $description = "Size: {$this->size}, Toppings: ";
        $toppings = [];

        if ($this->cheese) {
            $toppings[] = "Cheese";
        }

        if ($this->pepperoni) {
            $toppings[] = "Pepperoni";
        }

        if ($this->mushrooms) {
            $toppings[] = "Mushrooms";
        }

        $description .= implode(", ", $toppings);

        return $description;
    }
}
