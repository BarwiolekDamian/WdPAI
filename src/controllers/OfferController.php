<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Offer.php';
require_once __DIR__ . '/../repository/OfferRepository.php';

class OfferController extends AppController
{
    private $message = [];
    private $offerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->offerRepository = new OfferRepository();
    }

    public function addOffer()
    {
        if ($this->isPost())
        {
            // TODO: Create New Object & Save In DB
            $offer = new Offer
            (
                $_POST['language'],
                $_POST['native_language'],
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
        $offers = $this->offerRepository->getOffers();
        $this->render('offers', ['offers' => $offers]);
    }
}

?>