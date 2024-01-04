<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';

class SecurityController extends AppController
{

    public function login()
    {
        //! Temporary User
        $user = new User('admin@gmail.com', 'admin', 'Johnny', 'Snow');

        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

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