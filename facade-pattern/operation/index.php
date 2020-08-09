<?php

require('vendor/autoload.php');

use Acme\SubSystem1;
use Acme\SubSystem2;
use Acme\Facade;

function clientCode(Facade $facade) {
    // ...

    echo $facade->operation();

    // ...
}

$subSystem1 = new SubSystem1();
$subSystem2 = new SubSystem2();
$facade = new Facade($subSystem1, $subSystem2);
clientCode($facade);
