<?php

interface CompressionStrategy
{
    public function CompressFiles(array $files);
}

class ZipCompressionStrategy implements CompressionStrategy
{
    public function CompressFiles(array $files)
    {
        var_dump("compresses the files in zip format");
    }
}

class RarCompressionStrategy implements CompressionStrategy
{
    public function CompressFiles(array $files)
    {
        var_dump("compresses the files in Rar format");
    }
}

class CompressionContext
{
    protected $strategy;

    public function setCompressionStrategy(CompressionStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function createArchive($files)
    {
        $this->strategy->CompressFiles($files);
    }
}

// client (demo)

$compressionContext = new CompressionContext();

$compressionContext->setCompressionStrategy(new ZipCompressionStrategy());
$compressionContext->createArchive(['file.jpg', 'file2.jpg']);

$compressionContext->setCompressionStrategy(new RarCompressionStrategy());
$compressionContext->createArchive(['file.jpg', 'file2.jpg']);
