<?php

interface Shape
{
    public function draw();
}

class Rectangle implements Shape
{
    public function draw()
    {
        var_dump("Rectangle::draw() method");
    }
}

class Square implements Shape
{
    public function draw()
    {
        var_dump("Square::draw() method");
    }
}

class Circle implements Shape
{
    public function draw()
    {
        var_dump("Cirecle::draw() method");
    }
}

class ShapeFactory
{
    public static function getShape(string $shape)
    {
        switch ($shape) {
            case "rectangle":
                return new Rectangle();
                break;
            case "square":
                return new Square();
                break;
            case "circle":
                return new Circle();
                break;
            default:
                return null;
        }
    }
}

// demo
$shape1 = ShapeFactory::getShape("circle");
$shape1->draw();
