<?php

require_once(__DIR__ . '/Shape.php');

class Rectangle implements Shape
{
    public function draw()
    {
        echo "drawing a rectangle\n";
    }
}
