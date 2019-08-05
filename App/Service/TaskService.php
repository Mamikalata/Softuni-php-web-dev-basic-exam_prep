<?php

namespace App\Service;


use App\Data\DTO\taskDTO;
use App\Repository\TaskRepository;

class TaskService
{

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function Index()
    {
        $users = $this->taskRepository->getAll();
        foreach ($users as $user) {
            $user->setAuthor($this->taskRepository->getAuthor($user->getAuthor()));
            $user->setCategory($this->taskRepository->getCategory($user->getCategory()));
        }
        return $users;
    }

    public function Create(taskDTO $task)
    {
        $this->taskRepository->Create($task);
    }

    public function getCategories(): array
    {
        return $this->taskRepository->getCategories();
    }

    public function Edit(taskDTO $task)
    {
        if ($this->taskRepository->CheckId($task->getId()) == false) {
            throw new \Exception("Invalid Id!");
        }
        $this->taskRepository->Update($task);
    }

    public function Delete(int $id)
    {
        if ($this->taskRepository->CheckId($id) == false) {
            throw new \Exception("Invalid Id!");
        }
        $this->taskRepository->Delete($id);
    }

    public function getOne(int $id): taskDTO
    {
        if ($this->taskRepository->CheckId($id) == false) {
            throw new \Exception("Invalid Id!");
        }
        return $this->taskRepository->getOne($id);
    }
}