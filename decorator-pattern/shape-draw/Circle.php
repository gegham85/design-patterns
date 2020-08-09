<?php

require_once(__DIR__ . '/Shape.php');

class Circle implements Shape
{
    public function draw()
    {
        echo "drawing a circle\n";
    }
}
