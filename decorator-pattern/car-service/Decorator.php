<?php

interface CarService
{
    public function getCost();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 10;
    }
}

class OilChange implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 50 + $this->carService->getCost();
    }
}

class TireRotation implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 20 + $this->carService->getCost();
    }
}

// ------------------------------------------------------------------------

echo (new TireRotation(new BasicInspection()))->getCost();
echo (new OilChange(new TireRotation(new BasicInspection())))->getCost();