<?php

namespace App\Http;


use App\Data\DTO\taskDTO;
use App\Data\DTO\userDTO;
use App\Service\TaskService;
use App\Service\UserService;

class HttpHandler extends HttpHandlerAbstract
{
    public function Register(UserService $service, array $data)
    {
        if (isset($data['register'])) {
            $user = userDTO::Create(
                $data['username'],
                $data['password'],
                $data['first_name'],
                $data['last_name']
            );
            $_SESSION['id'] = $service->Register($user, $data['confirm_password']);
            $this->Redirect('success.php');
        } else {
            $this->template->Render("users/register");
        }
    }

    public function NamesHandler(UserService $service)
    {
        $user = $service->getOne($_SESSION['id']);
        $this->template->Render("home/success", array($user));
    }

    public function Login(UserService $service, array $data)
    {
        if (isset($data['login'])) {
            $user = $service->Login($data['username'], $data['password']);
            $_SESSION['id'] = $user->getId();
            $this->Redirect('dashboard.php');
        } else {
            $this->template->Render("users/login");
        }
    }

    public function Index(TaskService $service)
    {
        if (isset($_SESSION['id'])) {
            $users = $service->Index();
            $this->template->Render("tasks/index", $users);
        } else {
            $this->Redirect("index.php");
        }
    }

    public function CreateTask(TaskService $service, array $data)
    {
        if (isset($data['create'])) {
            $task = taskDTO::Create(
                $data['title'],
                $data['description'],
                $data['location'],
                $_SESSION['id'],
                $data["category"],
                $data["started_on"],
                $data["due_date"]
            );
            $service->Create($task);
            $this->Redirect("dashboard.php");
        } else {
            $categories = $service->getCategories();
            $this->template->Render("tasks/create", $categories);
        }
    }

    public function EditTask(TaskService $service, array $data)
    {
        if (isset($data['edit'])) {
            $task = taskDTO::Create(
                $data['title'],
                $data['description'],
                $data['location'],
                $_SESSION['id'],
                $data["category"],
                $data["started_on"],
                $data["due_date"],
                $_GET['id']
            );
            $service->Edit($task);
            $this->Redirect("dashboard.php");
        } else {
            $previousTask = $service->getOne($_GET['id']);
            $categories = $service->getCategories();
            $arrayData = [$categories, $previousTask];
            $this->template->Render("tasks/edit", $arrayData);
        }
    }

    public function DeleteTask(TaskService $service, array $data)
    {
        if (isset($data['yes'])) {
            $service->Delete($_GET['id']);
            $this->Redirect("dashboard.php");
        } else if (isset($data['no'])) {
            $this->Redirect("dashboard.php");
        } else {
            $this->template->Render("tasks/delete");
        }
    }
}