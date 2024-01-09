<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        session_start();

        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user || $user->getEmail() !== $email)
        {
            return $this->render('login', ['messages' => ['Unknown User!']]);
        }

        if (!password_verify($password, $user->getPassword()))
        {
            return $this->render('login', ['messages' => ['Incorrect Password!']]);
        }

        $_SESSION['user_email'] = $user->getEmail();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/offers");
        exit();
    }

    public function register()
    {
        if (!$this->isPost())
        {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if ($password !== $confirmedPassword)
        {
            return $this->render('register', ['messages' => ['Passwords Are Not The Same!']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($email, $hashedPassword, $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve Been Succesfully Registrated!']]);
    }
}

?>