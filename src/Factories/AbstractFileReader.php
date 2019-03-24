<?php

namespace App\Factories;

use App\Entity\User;

abstract class AbstractFileReader
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var int
     */
    protected $limit = 20;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * AbstractFileReader constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->initData();
    }

    /**
     * @param $login
     * @return User|bool
     */
    public function findByLogin($login)
    {

        $user = false;
        /**
         * @var $item User
         */
        foreach ($this->getData() as $item) {

            $current_user_name = $item->getLogin();

            if ($current_user_name == $login) {
                $user = $item;
                break;
            }

        }

        return $user;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }


    /**
     * @param string $name
     * @return array
     */
    protected function searchWithName($name)
    {
        if (empty($name)) {

            return $this->getData();
        }

        $users = [];


        /**
         * @var $user User
         */
        foreach ($this->getData() as $user) {

            $current_user_name = $user->getFirstName();
            if (stristr($current_user_name, $name)) {
                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * @param string $name
     * @param string $limit
     * @param string $offset
     * @return array
     */
    public function searchData($name, $limit, $offset)
    {
        $users = $this->searchWithName($name);


        if (empty($offset)) {
            $offset = $this->offset;
        }

        if (empty($limit)) {
            $limit = $this->limit;
        }

        return array_slice($users, $offset, $limit);
    }

}