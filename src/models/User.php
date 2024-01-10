<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $balance;
    private $lecturer;

    public function __construct
    (
        string $email,
        string $password,
        string $name,
        string $surname,
        bool $lecturer = false
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->lecturer = $lecturer;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance)
    {
        $this->balance = $balance;
    }

    public function isLecturer(): bool
    {
        return $this->lecturer;
    }

    public function setLecturer(bool $lecturer)
    {
        $this->lecturer = $lecturer;
    }
}

?>