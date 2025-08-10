<?php

interface CarFactory
{
    public function makeCar() : Car;
}

interface Car
{
    public function getType() : string;
}

class SedanFactory implements CarFactory
{
    public function makeCar(): Car
    {
        return new Sedan();
    }
}

class Sedan implements Car
{
    public function getType(): string
    {
        return "Sedan\n";
    }
}

class SuvFactory implements CarFactory
{
    public function makeCar(): Car
    {
        return new Suv();
    }
}

class Suv implements Car
{
    public function getType(): string
    {
        return "Suv\n";
    }
}
// ============== usage ==============

class CarController
{
    public function index(CarFactory $carFactory)
    {
        $car = $carFactory->makeCar();
        return $car->getType();
    }
}

echo (new CarController)->index(new SuvFactory());
