<?php

namespace App\Factories;

use App\Entity\User;

class ReadFromJson extends AbstractFileReader implements ReadInterface
{

    /**
     * @return array
     */
    protected function initData()
    {
        $json = file_get_contents($this->filename);
        $content = (json_decode($json, TRUE));
        $data = [];
        foreach ($content as $user) {
            $data[] = $this->getUserFromString($user);;
        }

        $this->data = $data;

        return $data;
    }


    /**
     * @param $user_array
     * @return User
     */
    private function getUserFromString($user_array)
    {

        $user = new User();

        $user->setLogin($user_array['login']);
        $user->setPassword($user_array['password']);
        $user->setTitle($user_array['title']);
        $user->setLastName($user_array['lastname']);
        $user->setFirstName($user_array['firstname']);
        $user->setGender($user_array['gender']);
        $user->setEmail($user_array['email']);
        $user->setPicture($user_array['picture']);
        $user->setAddress($user_array['address']);

        return $user;
    }


}