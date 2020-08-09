<?php

require_once(__DIR__ . '/Shape.php');
require_once(__DIR__ . '/ShapeDecorator.php');

class RedShapeDecorator extends ShapeDecorator
{
    public function __construct(Shape $shape)
    {
        parent::__construct($shape);
    }

    public function draw()
    {
        echo "=======red=======\n";
        $this->decoratedShape->draw();
        echo "=======red=======\n";
    }
}