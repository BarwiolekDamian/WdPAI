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

    public function offers()
    {
        $offers = $this->offerRepository->getOffers();
        $this->render('offers', ['offers' => $offers]);
    }
}

?>