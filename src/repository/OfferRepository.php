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
            SELECT o.*, ud.name, ud.surname, u.email
            FROM offers o
            JOIN users u ON o.id_assigned_by = u.id
            JOIN users_details ud ON u.id_user_details = ud.id
            WHERE o.id = :id;
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
            $offer['id'],
            $offer['language'],
            $offer['native_language'],
            $offer['description'],
            $offer['price'],
            $offer['min_level'],
            $offer['like'],
            $offer['dislike'],
            $offer['experience'],
            $offer['name'],
            $offer['surname'],
            $offer['email']
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
            SELECT o.*, ud.name, ud.surname, u.email 
            FROM offers o
            JOIN users u ON o.id_assigned_by = u.id
            JOIN users_details ud ON u.id_user_details = ud.id;
        ');

        $result = [];
        $stmt->execute();
        
        $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($offers as $offer)
        {
            $result[] = new Offer
            (
                $offer['id'],
                $offer['native_language'],
                $offer['language'],
                $offer['description'],
                $offer['price'],
                $offer['min_level'],
                $offer['like'],
                $offer['dislike'],
                $offer['experience'],
                $offer['name'],
                $offer['surname'],
                $offer['email']
            );
        }

        return $result;
    }

    public function buyOffer(Offer $offer): string
    {
        $user = $this->userRepository->getUser($_SESSION['user_email']);
        $actual_balance = $user->getBalance();
        $price = (int) $offer->getPrice();

        if ($actual_balance < $price)
        {
            return "INSUFFICIENT FUNDS FOR PURCHASE.";
        }

        $stmt = $this->database->connect()->prepare
        ('
            UPDATE users SET balance = balance - :price WHERE email = :email
        ');

        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':email', $_SESSION['user_email'], PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare
        ('
            UPDATE users SET balance = balance + :price WHERE email = :email
        ');

        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':email', $offer->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        return "PURCHASE COMPLETED SUCCESSFULLY.";
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