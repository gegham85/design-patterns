<?php

require_once(__DIR__ . '/Shape.php');

abstract class ShapeDecorator implements Shape
{
    protected $decoratedShape;

    public function __construct(Shape $decoratedShape)
    {
        $this->decoratedShape = $decoratedShape;
    }

    abstract public function draw();
}