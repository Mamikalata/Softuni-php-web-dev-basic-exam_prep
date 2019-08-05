<?php

namespace App\Data\DTO;


class taskDTO
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $location;

    private $author;

    private $category;

    /**
     * @var string
     */
    private $started_on;

    /**
     * @var string
     */
    private $duo_date;

    /**
     * @var int
     */
    private $id;

    public static function Create(string $title, string $description, string $location,
                                  $author, $category, string $started_on = null, string $duo_date = null, int $id = null): taskDTO
    {
        return (new taskDTO())
            ->setTitle($title)
            ->setDescription($description)
            ->setLocation($location)
            ->setAuthor($author)
            ->setCategory($category)
            ->setStartedOn($started_on)
            ->setDuoDate($duo_date)
            ->setId($id);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return $this
     * @throws \Exception
     */
    public function setTitle($title)
    {
        $length = strlen($title);
        if ($length < 3 || $length > 50) {
            if ($length < 3) {
                throw new \Exception("Title too short!");
            } else {
                throw new \Exception("Title too long!");
            }
        }
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return $this
     * @throws \Exception
     */
    public function setDescription($description)
    {
        $length = strlen($description);
        if ($length < 10 || $length > 10000) {
            if ($length < 10) {
                throw new \Exception("Description too short!");
            } else {
                throw new \Exception("Description too long!");
            }
        }
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return $this
     * @throws \Exception
     */
    public function setLocation($location)
    {
        $length = strlen($location);
        if ($length < 3 || $length > 100) {
            throw new \Exception("Invalid Location!");
        }
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param $author
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartedOn()
    {
        return $this->started_on;
    }

    /**
     * @param $started_on
     * @return $this
     */
    public function setStartedOn($started_on)
    {
        $this->started_on = $started_on;
        return $this;
    }

    /**
     * @return string
     */
    public function getDuoDate()
    {
        return $this->duo_date;
    }

    /**
     * @param $duo_date
     * @return $this
     */
    public function setDuoDate($duo_date)
    {
        $this->duo_date = $duo_date;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}