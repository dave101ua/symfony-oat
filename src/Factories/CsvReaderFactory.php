<?php

namespace App\Factories;

class CsvReaderFactory implements ReaderFactoryInterface
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function createReader():ReadFromCsv
    {
        return new ReadFromCsv($this->filename);
    }
}