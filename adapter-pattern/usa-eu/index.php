<?php

require('vendor/autoload.php');

use Acme\Socket;
use Acme\Adapter;
use Acme\ElectricKettle;

$socket = new Socket();
$adapter = new Adapter($socket);
$kettle = new ElectricKettle($adapter);

$kettle->boil();