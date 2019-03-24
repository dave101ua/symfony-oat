<?php

namespace App\Controller;

use App\Factories\CsvReaderFactory;
use App\Factories\ReadFromJson;
use App\Services\GetFileReaderFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {

        return $this->json(['home']);
    }

    /**
     * @Route("/users", name="users")
     */
    public function users(Request $request)
    {
        $name = $request->get('name');
        $limit = $request->get('limit');
        $offset = $request->get('offset');

        //$csvReader = new ReadFromCsv('testtakers.csv');
        $reader = new ReadFromJson('testtakers_small.json');

        $data =$reader->searchData($name, $limit, $offset);

        return $this->json($data,200, [],['groups'=>['main']]);
    }

    /**
     * @Route("/user/{slug}")
     */
    public function user($slug, GetFileReaderFactory $fileReaderFactory, Request $request){

        $factory = $fileReaderFactory->getFactory($request);
        $reader = $factory->createReader();

        $data = $reader->findByLogin($slug);
        if(!$data){
            return $this->json($data,404);
        }

        return $this->json($data,200, [],['groups'=>['main']]);
    }
}
