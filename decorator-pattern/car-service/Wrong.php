<?php

class CarService
{
    private $cost = 10;

    public function getCost()
    {
        return $this->cost;
    }

    public function withOilChange()
    {
        $this->cost += 50;
        return $this;
    }

    public function withTireRotation()
    {
        $this->cost += 20;
        return $this;
    }
}

// ------------------------------------------------------------------------

// this breaks Open/Closed principle (SOLID Principle)
echo (new CarService)->withOilChange()->withTireRotation()->getCost();