<?php

namespace App\Factories;
interface ReadInterface{
    public function searchData($name, $limit, $offset);
    public function findByLogin($login);
}