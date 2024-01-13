<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare
        ('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_user_details = ud.id WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false)
        {
            return null;
        }

        return new User
        (
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['phone'],
            $user['balance'],
            $user['lecturer']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare
        ('
            INSERT INTO users_details ( name, surname, phone )
            VALUES (?, ?, ?)
        ');

        $stmt->execute
        ([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
        ]);

        $stmt = $this->database->connect()->prepare
        ('
            INSERT INTO users ( email, password, id_user_details )
            VALUES (?, ?, ?)
        ');

        $stmt->execute
        ([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }

    public function getUserId(string $email): int
    {
        $stmt = $this->database->connect()->prepare
        ('
            SELECT * FROM users WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare
        ('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone = :phone
        ');

        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $stmt->bindParam(':phone', $user->getPhone(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $data['id'];
    }

    public function updateUser(User $user)
    {
        $connection = $this->database->connect();

        try
        {
            $connection->beginTransaction();

            $stmt = $connection->prepare
            ('
                UPDATE users_details SET name = :name, surname = :surname, phone = :phone
                WHERE id = :id
            ');

            $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
            $stmt->bindParam(':phone', $user->getPhone(), PDO::PARAM_STR);
            $stmt->bindParam(':id', $user->getIdUserDetails(), PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $connection->prepare
            ('
                UPDATE users SET email = :email, balance = :balance, lecturer = :lecturer
                WHERE id_user_details = :id_user_details
            ');

            $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':balance', $user->getBalance());
            $stmt->bindParam(':lecturer', $user->isLecturer(), PDO::PARAM_BOOL);
            $stmt->bindParam(':id_user_details', $user->getIdUserDetails(), PDO::PARAM_INT);
            $stmt->execute();

            $connection->commit();
        }
        catch (Exception $e)
        {
            if ($connection->inTransaction())
            {
                $connection->rollBack();
            }
            
            throw $e;
        }
    }
}

?>