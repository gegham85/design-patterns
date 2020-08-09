<?php namespace Acme;

class ElectricKettle
{
    protected $power;

    public function __construct(USASocketInterface $power)
    {
        $this->power = $power;
    }

    public function boil()
    {
        if ($this->power->voltage() > 110) {
            echo "Kettle on fire!\n";
        } else {
            if ($this->power->live() == 1 && $this->power->neutral() == -1) {
                echo "Coffee time!\n";
            } else {
                echo "no power\n";
            }
        }
    }
}
