<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class AccountController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function account()
    {
        session_start();

        if (!isset($_SESSION['user_email']))
        {
            header('Location: login');
            exit();
        }

        if ($this->isPost())
        {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phone = $_POST['phone'];
            $balance = $_POST['balance'];
            $lecturer = $_POST['lecturer'];

            $user = $this->userRepository->getUser($_POST['email']);
            $user->setIdUserDetails($this->userRepository->getUserDetailsId($user));
            
            $user->setName($name);
            $user->setSurname($surname);
            $user->setPhone($phone);
            $user->setBalance($balance);
            $user->setLecturer($lecturer);

            $this->userRepository->updateUser($user);

            $user = $this->userRepository->getUser($_SESSION['user_email']);
            $this->render('account', ['user' => $user]);
        } else {
            $user = $this->userRepository->getUser($_SESSION['user_email']);
            $this->render('account', ['user' => $user]);
        }
    }
}

?>