<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Offer.php';

class OfferRepository extends Repository
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function getOffer(int $id): ?Offer
    {
        $stmt = $this->database->connect()->prepare
        ('
            SELECT * FROM public.offers WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $offer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$offer)
        {
            return null;
        }

        return new Offer
        (
            $offer['native_language'],
            $offer['language'],
            $offer['description'],
            $offer['price'],
            $offer['min_level'],
            $offer['like'],
            $offer['dislike'],
            $offer['experience']
        );
    }

    public function addOffer(Offer $offer): void
    {
        $stmt = $this->database->connect()->prepare
        ('
            SELECT add_offer_and_return_id(?, ?, ?, ?, ?, ?, ?)
        ');

        $assignedById = $this->userRepository->getUserId($_SESSION['user_email']);

        $stmt->execute
        ([
            $offer->getNativeLanguage(),
            $offer->getLanguage(),
            $offer->getDescription(),
            $offer->getPrice(),
            $offer->getMinLevel(),
            $offer->getExperience(),
            $assignedById
        ]);

        $offerId = $stmt->fetch(PDO::FETCH_COLUMN);

        $stmt = $this->database->connect()->prepare
        ('
            INSERT INTO users_offers (id_user, id_offer)
            VALUES (?, ?)
        ');
        
        $stmt->execute([$assignedById, $offerId]);
    }

    public function getOffers(): array
    {
        $stmt = $this->database->connect()->prepare
        ('
            SELECT * FROM offers;
        ');

        $result = [];
        $stmt->execute();
        
        $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($offers as $offer)
        {
            $result[] = new offer
            (
                $offer['language'],
                $offer['native_language'],
                $offer['description'],
                $offer['price'],
                $offer['min_level'],
                $offer['like'],
                $offer['dislike'],
                $offer['experience']
            );
        }

        return $result;
    }

    public function getOffersByLanguage(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare
        ('
            SELECT * FROM offers WHERE LOWER(language) LIKE :search
        ');
        
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>