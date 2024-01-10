<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__ . '/../models/Offer.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/OfferRepository.php';

class OfferController extends AppController
{
    private $message = [];
    private $offerRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->offerRepository = new OfferRepository();
    }

    public function addOffer()
    {
        session_start();

        if (!isset($_SESSION['user_email']))
        {
            header('Location: login');
            exit();
        }

        $user = $this->userRepository->getUser($_SESSION['user_email']);

        if ($user == null || $user->isLecturer())
        {
            $this->message[] = 'YOU DO NOT HAVE PERMISSION TO ADD OFERTS.';
            return $this->render('offers', ['messages' => $this->message]);
        }

        if ($this->isPost())
        {
            $offer = new Offer
            (
                $_POST['native_language'],
                $_POST['language'],
                $_POST['description'],
                $_POST['price'],
                $_POST['min_level'],
                $_POST['like'],
                $_POST['dislike'],
                $_POST['experience']
            );

            $this->offerRepository->addOffer($offer);

            return $this->render
            (
                'offers',
                [
                    'messages' => $this->message,
                    'offers' => $this->offerRepository->getOffers()
                ]
            );
        }

        return $this->render('add-offer', ['messages' => $this->message]);
    }

    public function offers()
    {
        session_start();

        if (!isset($_SESSION['user_email']))
        {
            header('Location: login');
            exit();
        }

        $offers = $this->offerRepository->getOffers();
        $this->render('offers', ['offers' => $offers]);
    }

    public function search()
    {
        session_start();

        if (!isset($_SESSION['user_email']))
        {
            header('Location: login');
            exit();
        }
        
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json")
        {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->offerRepository->getOffersByLanguage($decoded['search']));
        }
    }
}

?>