<?php

class Offer
{
    private $native_language;
    private $language;
    private $description;
    private $price;
    private $min_level;
    private $like;
    private $dislike;
    private $experience;
    private $name;
    private $surname;

    public function __construct
    (
        string $native_language,
        string $language,
        string $description,
        string $price,
        string $min_level,
        string $like,
        string $dislike,
        string $experience,
        string $name,
        string $surname,
    )
    {
        $this->native_language = $native_language;
        $this->language = $language;
        $this->description = $description;
        $this->price = $price;
        $this->min_level = $min_level;
        $this->like = $like;
        $this->dislike = $dislike;
        $this->experience = $experience;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getNativeLanguage()
    {
        return $this->native_language;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getMinLevel()
    {
        return $this->min_level;
    }

    public function getLike()
    {
        return $this->like;
    }

    public function getDislike()
    {
        return $this->dislike;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function setNativeLanguage($native_language)
    {
        $this->native_language = $native_language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setMinLevel($min_level)
    {
        $this->min_level = $min_level;
    }

    public function setLike($like)
    {
        $this->like = $like;
    }

    public function setDislike($dislike)
    {
        $this->dislike = $dislike;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }
}

?>