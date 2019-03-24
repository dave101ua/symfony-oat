<?php

namespace App\Factories;
use App\Entity\User;
use Doctrine\ORM\Mapping\Entity;

class ReadFromCsv extends AbstractFileReader implements ReadInterface
{

    /**
     *
     */
    protected function initData()
    {
        $content = file($this->filename);
        unset($content[0]);
        $data = [];
        foreach ($content as $user) {
            $data[] = $this->getUserFromString($user);;
        }
        $this->data = $data;
    }


    /**
     * @param $row
     * @return User
     */
    private function getUserFromString($row)
    {
        $user_array = str_getcsv($row, ',', '""');

        $user = new User();

        $user->setLogin($user_array[0]);
        $user->setPassword($user_array[1]);
        $user->setTitle($user_array[2]);
        $user->setLastName($user_array[3]);
        $user->setFirstName($user_array[4]);
        $user->setGender($user_array[5]);
        $user->setEmail($user_array[6]);
        $user->setPicture($user_array[7]);
        $user->setAddress($user_array[8]);

        return $user;
    }

}