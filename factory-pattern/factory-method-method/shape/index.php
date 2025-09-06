<?php

interface Shape
{
    public function draw();
}

interface ShapeFactory 
{
    public function getShape();
}

class Rectangle implements Shape
{
    public function draw()
    {
        var_dump("Rectangle::draw() method");
    }
}

class RectangleFactory implements ShapeFactory 
{
    public function getShape()
    {
        return new Rectangle();
    }
}

class Square implements Shape
{
    public function draw()
    {
        var_dump("Square::draw() method");
    }
}

class SquareFactory implements ShapeFactory 
{
    public function getShape()
    {
        return new Square();
    }
}


class Circle implements Shape
{
    public function draw()
    {
        var_dump("Cirecle::draw() method");
    }
}

class CircleFactory implements ShapeFactory 
{
    public function getShape()
    {
        return new Circle();
    }
}

class DrawShape
{
    protected Shape $shape;

    public function __construct(ShapeFactory $shapeFactory) 
    {
        $this->shape = $shapeFactory->getShape();
    }

    public function drawShape()
    {
        $this->shape->draw();
    }
}

// demo
$drawShape = new DrawShape(new RectangleFactory());
$drawShape->drawShape();
