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


// demo
$shape1 = new ShapeFactory()->getShape();
$shape1->draw();
