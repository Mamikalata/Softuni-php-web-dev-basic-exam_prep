<?php

namespace App\Service;


use App\Data\DTO\userDTO;
use App\Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function Register(userDTO $user, string $confirmPassword): int
    {
        $isValid = $this->userRepository->checkUsername($user->getUsername());
        if ($isValid == true) {
            if ($user->getPassword() != $confirmPassword) {
                throw new \Exception("Passwords don't match!");
            } else {
                $password_hash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
                $user->setPassword($password_hash);
                return $this->userRepository->Insert($user);
            }
        } else {
            throw new \Exception("This Username is already taken!");
        }
    }

    public function getOne(int $id): userDTO
    {
        $isValid = $this->userRepository->checkId($id);
        if ($isValid == false) {
            throw new \Exception("Invalid Id!");
        }
        return $this->userRepository->getOne($id);
    }

    public function Login(string $username, string $password): userDTO
    {
        $isValid = $this->userRepository->checkUsername($username);
        if ($isValid == false) {
            $user = $this->userRepository->getOneByUsername($username);
            if (password_verify($password, $user->getPassword()) == false) {
                throw new \Exception("Password mismatch.");
            }
            return $user;
        } else {
            throw new \Exception("Invalid Username!");
        }
    }
}