<?php
require_once(__DIR__ . '/RedShapeDecorator.php');
require_once(__DIR__ . '/Rectangle.php');
require_once('Circle.php');

$circle = new Circle();
$rectangle = new Rectangle();

$circle->draw();

$redShapeCircle = new RedShapeDecorator(new Circle);
$redShapeCircle->draw();

$redShapeRectangle = new RedShapeDecorator(new Rectangle);
$redShapeRectangle->draw();
