<?php
namespace App\Services;
use App\Factories\CsvReaderFactory;
use App\Factories\JsonReaderFactory;
use App\Factories\ReaderFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class GetFileReaderFactory{
    public function __construct()
    {
    }

    /**
     * @param Request $request
     * @return ReaderFactoryInterface
     */
    public function getFactory(Request $request):ReaderFactoryInterface
    {
        if($request->get("json") ==1 ){
            $filename = 'testtakers_small.json';
            $reader_factory = new JsonReaderFactory($filename);
        }else{
            $filename = 'testtakers_small.csv';
            $reader_factory = new CsvReaderFactory($filename);
        }

        return $reader_factory;
    }
}