<?php

require 'vendor/autoload.php';

use Acme\TurkeySub;
use Acme\VeggieSub;

(new TurkeySub())->make();
echo "=================\n";
(new VeggieSub())->make();
