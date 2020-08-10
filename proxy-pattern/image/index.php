<?php

interface Image
{
    public function display();
}

class RealImage implements Image
{
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->loadFromDisk($filename);
    }

    public function display()
    {
        echo "Displaying " . $this->filename . "\n";
    }

    protected function loadFromDisk(string $filename)
    {
        echo "loading : " . $filename . "\n";
    }
}

class ProxyImage implements Image
{
    private $realImage;
    private $fileName;

    public function __construct(string $filename)
    {
        $this->fileName = $filename;
    }

    public function display()
    {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->fileName);
        }

        $this->realImage->display();
    }
}

// ============== usage ==============

$image = new ProxyImage("test.jpg");

//image will be loaded from disk
$image->display();

//image will be loaded from disk
$image->display();

