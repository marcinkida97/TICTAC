<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class ManagerRepository extends Repository
{
    public function addManager(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, role)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getRole()
        ]);

        $email = $user->getEmail();
        $stmt = $this->database->connect()->prepare('
            SELECT user_id FROM users WHERE email = :email'
        );
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_data (uid, name, surname, company)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $id['user_id'],
            $user->getName(),
            $user->getSurname(),
            $user->getCompany()
        ]);
    }
}