<?php

namespace App\Repository;


use App\Data\DTO\taskDTO;
use Database\PDODatabase;
use App\Data\DTO\userDTO;
use App\Data\DTO\categoryDTO;

class TaskRepository
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

    public function getAll(): array
    {
        $users = $this->db->query("SELECT id, title, description, location, 
author_id AS author, category_id AS category, started_on, due_date FROM tasks")
            ->execute()
            ->fetch(taskDTO::class);
        $result = [];
        foreach ($users as $user) {
            array_push($result, $user);
        }
        return $result;
    }

    /**
     * @param int $author_id
     * @return string
     */
    public function getAuthor(int $author_id): string
    {
        $stm = $this->db->query("SELECT id, username, password, first_name AS  firstName, 
last_name AS lastName FROM users 
WHERE id = ?");
        $user = $stm->execute([$author_id])->fetch(userDTO::class)->current();
        return $user->getUsername();
    }

    /**
     * @param int $category_id
     * @return string
     */
    public function getCategory(int $category_id): string
    {
        $stm = $this->db->query("SELECT id, name FROM categories 
WHERE id = ?");
        $category = $stm->execute([$category_id])->fetch(categoryDTO::class)->current();
        return $category->getName();
    }

    public function Create(taskDTO $task)
    {
        $stm = $this->db->query("INSERT INTO tasks (title, description, location, 
author_id, category_id, started_on, due_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stm->execute([
            $task->getTitle(),
            $task->getDescription(),
            $task->getLocation(),
            $task->getAuthor(),
            $task->getCategory(),
            $task->getStartedOn(),
            $task->getDuoDate()
        ]);
    }

    public function getCategories(): array
    {
        $categories = $this->db->query("SELECT * FROM categories")
            ->execute()
            ->fetch(categoryDTO::class);
        $result = [];
        foreach ($categories as $category) {
            array_push($result, $category);
        }
        return $result;
    }

    public function Update(taskDTO $task)
    {
        $stm = $this->db->query("UPDATE tasks SET title = ?, description = ?, location = ?, 
author_id = ?, category_id = ?, due_date = ? WHERE id = ?");
        $stm->execute([
            $task->getTitle(),
            $task->getDescription(),
            $task->getLocation(),
            $task->getAuthor(),
            $task->getCategory(),
            $task->getDuoDate(),
            $task->getId()
        ]);
    }

    public function Delete(int $id)
    {
        $this->db->query("DELETE FROM tasks WHERE id = ?")
            ->execute([$id]);
    }

    public function CheckId(int $id): bool
    {
        $stm = $this->db->query("SELECT title, description, location, 
author_id AS author, category_id AS category, started_on, due_date FROM tasks WHERE id = ?");
        $task = $stm->execute([$id])->fetch(userDTO::class)->current();
        if ($task == null) {
            return false;
        }
        return true;
    }

    public function getOne(int $id): taskDTO
    {
        return $this->db->query("SELECT id, title, description, location, 
author_id AS author, category_id AS category, started_on, due_date FROM tasks WHERE id = ?")
            ->execute([$id])
            ->fetch(taskDTO::class)
            ->current();
    }
}