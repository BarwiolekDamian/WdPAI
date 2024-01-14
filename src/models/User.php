<?php

class User {
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $balance;
    private $lecturer;
    private $id_user_details;

    public function __construct
    (
        string $email,
        string $password,
        string $name,
        string $surname,
        string $phone,
        int $balance,
        bool $lecturer
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->balance = $balance;
        $this->lecturer = $lecturer;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
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
        if ($lecturer == 'Yes')
        {
            $this->lecturer = true;
            return;
        }

        $this->lecturer = false;
    }

    public function getLecturer(): string
    {
        if ($this->lecturer)
        {
            return 'Yes';
        }

        return 'No';
    }

    public function getIdUserDetails(): int
    {
        return $this->id_user_details;
    }

    public function setIdUserDetails(int $id_user_details)
    {
        $this->id_user_details = $id_user_details;
    }
}

?>