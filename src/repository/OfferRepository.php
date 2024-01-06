<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Offer.php';

class OfferRepository extends Repository
{
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

    public function addOffer(Offer $offer): void
    {
        $stmt = $this->database->connect()->prepare
        ('
            INSERT INTO offers ( language, native_language, description, price, min_level, experience, id_assigned_by )
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        //TODO: Get Value From Logged User Session
        $assignedById = 4;

        $stmt->execute
        ([
            $offer->getLanguage(),
            $offer->getNativeLanguage(),
            $offer->getDescription(),
            $offer->getPrice(),
            $offer->getMinLevel(),
            $offer->getExperience(),
            $assignedById
        ]);
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
}

?>