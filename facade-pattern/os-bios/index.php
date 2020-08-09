<?php

require('vendor/autoload.php');

use Acme\WindowsOS;
use Acme\LenovaBios;
use Acme\Facade;

$os = new WindowsOS();
$bios = new LenovaBios();

$facade = new Facade($bios, $os);

$facade->turnOn();
