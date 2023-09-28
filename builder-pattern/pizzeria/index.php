<?php

require('vendor/autoload.php');

// Client code
use src\MargheritaPizzaBuilder;
use src\PizzaMaker;

$builder = new MargheritaPizzaBuilder();
$director = new PizzaMaker();

$pizza = $director->makePizza($builder, "Medium");

echo $pizza->getDescription(); // Output: Size: Medium, Toppings: Cheese
