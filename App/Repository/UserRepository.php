<?php

namespace App\Repository;


use Database\PDODatabase;
use App\Data\DTO\userDTO;

class UserRepository
{

    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * userRepository constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function Insert(userDTO $user): int
    {
        $stm = $this->db->query("INSERT INTO users (username, password, first_name, last_name) 
VALUES (?, ?, ?, ?)");
        $stm->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName()
        ]);
        return $this->db->lastInsertId();
    }

    public function getOne(int $id): userDTO
    {
        return $this->db->query("SELECT username, password, first_name AS  firstName, 
last_name AS lastName FROM users WHERE id = ?")
            ->execute([$id])
            ->fetch(userDTO::class)
            ->current();
    }

    public function checkUsername(string $username): bool
    {
        $stm = $this->db->query("SELECT username, password,
 first_name AS firstName, last_name AS lastName FROM users WHERE username = ?");
        $user = $stm->execute([$username])->fetch(userDTO::class)->current();
        if ($user == null) {
            return true;
        }
        return false;
    }

    public function checkId(int $id): bool
    {
        $stm = $this->db->query("SELECT username, password,
 first_name AS firstName, last_name AS lastName FROM users WHERE id = ?");
        $user = $stm->execute([$id])->fetch(userDTO::class)->current();
        if ($user == null) {
            return false;
        }
        return true;
    }

    public function getOneByUsername(string $username): userDTO 
    {
        $stm = $this->db->query("SELECT id, username, password, first_name AS firstName, 
last_name AS lastName FROM users WHERE username = ?");
       return $stm->execute([$username])->fetch(userDTO::class)->current();
    }
}