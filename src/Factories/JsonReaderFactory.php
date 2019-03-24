<?php
namespace App\Factories;
class JsonReaderFactory implements ReaderFactoryInterface {
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function createReader()
    {
        return new ReadFromJson($this->filename);
    }
}