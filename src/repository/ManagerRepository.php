<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class ManagerRepository extends Repository
{
    public function addManager(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, name, surname, role, company)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getRole(),
            $user->getCompany()
        ]);
    }
}