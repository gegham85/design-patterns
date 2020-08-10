<?php

require('vendor/autoload.php');

use Acme\Produce;
use Acme\Assemble;
use Acme\Car;
use Acme\Bike;

$vehicle1 = new Car(new Produce, new Assemble);
$vehicle1->manufacture();

$vehicle2 = new Bike(new Produce, new Assemble);
$vehicle2->manufacture();
