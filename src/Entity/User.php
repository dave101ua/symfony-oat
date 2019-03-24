<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups("main")
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("main")
     */
    private $address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }
}
