<?php

namespace App\Data\DTO;


class categoryDTO
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $id;

    public static function Create(string $name, int $id = null): categoryDTO
    {
        return (new categoryDTO())
            ->setName($name)
            ->setId($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     * @throws \Exception
     */
    public function setName($name)
    {
        $length = strlen($name);
        if ($length < 3 || $length > 50) {
            if ($length < 3) {
                throw new \Exception("Category name too short!");
            } else {
                throw new \Exception("Category name  too long!");
            }
        }
        $this->name = $name;
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