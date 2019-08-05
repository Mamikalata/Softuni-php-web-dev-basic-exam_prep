<?php

namespace App\Data\DTO;


class userDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @param string $username
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     * @param int|null $id
     * @return userDTO
     * @throws \Exception
     */
    public static function Create(string $username, string $password, string $firstName,
                           string $lastName, int $id = null) : userDTO
    {
        return (new userDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setId($id);
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
     * @return userDTO
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return userDTO
     * @throws \Exception
     */
    public function setUsername($username)
    {
        $length = strlen($username);
        if ($length < 4 || $length > 255) {
            if ($length < 4) {
                throw new \Exception("Username too short!");
            } else {
                throw new \Exception("Username too long!");
            }
        }
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return userDTO
     * @throws \Exception
     */
    public function setPassword($password)
    {
        $length = strlen($password);
        if ($length < 6 || $length > 255) {
            if ($length < 6) {
                throw new \Exception("Password too short!");
            } else {
                throw new \Exception("Password too long!");
            }
        }
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return userDTO
     * @throws \Exception
     */
    public function setFirstName($firstName)
    {
        $length = strlen($firstName);
        if ($length < 3 || $length > 255) {
            if ($length < 3) {
                throw new \Exception("First name too short!");
            } else {
                throw new \Exception("First name too long!");
            }
        }
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return userDTO
     * @throws \Exception
     */
    public function setLastName($lastName)
    {
        $length = strlen($lastName);
        if ($length < 3 || $length > 255) {
            if ($length < 3) {
                throw new \Exception("Last name too short!");
            } else {
                throw new \Exception("Last name too long!");
            }
        }
        $this->lastName = $lastName;
        return $this;
    }
}