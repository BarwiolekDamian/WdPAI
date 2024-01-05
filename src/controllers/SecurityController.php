<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    public function login()
    {
        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);

        if (!$user)
        {
            return $this->render('login', ['messages' => ['Unknown User!']]);
        }

        if ($user->getEmail() !== $email)
        {
            return $this->render('login', ['messages' => ['Unknown Email Address!']]);
        }

        if ($user->getPassword() !== $password)
        {
            return $this->render('login', ['messages' => ['Incorrect Password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/offers");
    }

    public function register()
    {
        if (!$this->isPost())
        {
            return $this->render('register');
        }
    }
}

?>