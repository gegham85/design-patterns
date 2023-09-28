<?php

namespace src;

interface PizzaBuilder
{
    public function setSize($size);

    public function addCheese();

    public function addPepperoni();

    public function addMushrooms();

    public function build();
}