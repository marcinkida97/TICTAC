<?php

//namespace models; //to mi wywaliło błąd, że nie znajdowało klasy user!

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role;
    private $company;

    public function __construct(string $email, string $password, string $name, string $surname, string $role, string $company)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->company = $company;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }


}