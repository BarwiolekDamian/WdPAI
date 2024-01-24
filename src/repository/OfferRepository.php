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
        $connection = $this->database->connect();

        try
        {
            $connection->beginTransaction();

            $stmt = $connection->prepare
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

            $stmt = $connection->prepare
            ('
                INSERT INTO users_offers (id_user, id_offer)
                VALUES (?, ?)
            ');

            $stmt->execute([$assignedById, $offerId]);
            $connection->commit();
        }
        catch (PDOException $exceptionObj)
        {
            if ($connection->inTransaction())
            {
                $connection->rollBack();
            }

            throw $exceptionObj;
        }
    }

    public function buyOffer(Offer $offer): string
    {
        try
        {
            $this->database->connect()->beginTransaction();

            $user = $this->userRepository->getUser($_SESSION['user_email']);
            $actual_balance = $user->getBalance();
            $price = (int) $offer->getPrice();

            if ($actual_balance < $price)
            {
                if ($this->database->connect()->inTransaction())
                {
                    $this->database->connect()->rollBack();
                }

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

            if ($this->database->connect()->inTransaction())
            {
                $this->database->connect()->commit();
            }

            return "PURCHASE COMPLETED SUCCESSFULLY.";
        } catch (PDOException $exceptionObj)
        {
            if ($this->database->connect()->inTransaction())
            {
                $this->database->connect()->rollBack();
            }

            throw $exceptionObj;
        }
    }

    public function getOffers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare
        ('
            SELECT o.*, ud.name, ud.surname, u.email 
            FROM offers o
            JOIN users u ON o.id_assigned_by = u.id
            JOIN users_details ud ON u.id_user_details = ud.id;
        ');

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

    public function getOffersByLanguage(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare
        ('
            SELECT o.*, ud.name, ud.surname
            FROM offers o
            JOIN users_offers uo ON o.id = uo.id_offer
            JOIN users u ON uo.id_user = u.id
            JOIN users_details ud ON u.id_user_details = ud.id
            WHERE LOWER(o.language) LIKE :search;
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>