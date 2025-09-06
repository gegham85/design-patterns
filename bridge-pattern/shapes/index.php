<?php
/*
Imagine you're building a drawing program that can create different shapes (circles, squares) and 
save them in different file formats (JPG, PNG).

The Bridge pattern helps you avoid a complex mess. The problem is you could end up with a huge number of 
classes like JpgCircle, PngCircle, JpgSquare, PngSquare, and so on.

The solution is to separate the shapes from the file formats.
    - The shapes are one part of the system. A Circle knows what a circle is, and a Square knows what a square is.
    - The file formats are the other part. A JpgSaver knows how to save a JPG file, and a PngSaver knows how to save a PNG file.

The bridge is the connection between them. A Circle object holds a reference to a JpgSaver object. 
When you tell the Circle to "draw," it simply tells its JpgSaver to save a JPG file.
*/


// --- Implementation: The file format hierarchy ---

interface FileSaver {
    public function save(string $data): void;
}

class JpgSaver implements FileSaver {
    public function save(string $data): void {
        echo "Saving image data as JPG: " . $data . "\n";
    }
}

class PngSaver implements FileSaver {
    public function save(string $data): void {
        echo "Saving image data as PNG: " . $data . "\n";
    }
}

// ---------------------------------------------------

// --- Abstraction: The shape hierarchy ---

abstract class Shape {
    protected FileSaver $saver;

    public function __construct(FileSaver $saver) {
        $this->saver = $saver;
    }

    abstract public function draw(): void;
}

class Circle extends Shape {
    public function draw(): void {
        $this->saver->save("Circle-specific-data");
    }
}

class Square extends Shape {
    public function draw(): void {
        $this->saver->save("Square-specific-data");
    }
}

// ---------------------------------------------------

// --- Client Code: Mixing and matching ---

// Create a circle and save it as a JPG
$jpgSaver = new JpgSaver();
$circle = new Circle($jpgSaver);
$circle->draw(); // Output: Saving image data as JPG: Circle-specific-data

echo "\n";

// Create a square and save it as a PNG
$pngSaver = new PngSaver();
$square = new Square($pngSaver);
$square->draw(); // Output: Saving image data as PNG: Square-specific-data
