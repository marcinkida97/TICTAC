<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Worker.php';

class WorkersRepository extends Repository
{
    public function getWorkers() :array
    {
        $result = [];

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $user = $_SESSION['user'];
        $company = $user->getCompany();

        $stmt = $this->database->connect()->prepare('
            SELECT users.user_id, users.email, users.password, users.role, users_data.name, users_data.surname, users_data.company
            FROM users
            INNER JOIN users_data ON users.user_id = users_data.uid
            WHERE users_data.company = :company
        ');
        $stmt->bindParam(':company', $company);
        $stmt->execute();
        $workers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($workers as $user) {
            $result[] = new User(
                $user['user_id'],
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['role'],
                $user['company']
            );
        }

        return $result;
    }

    public function addWorker(Worker $worker): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, role)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $worker->getEmail(),
            $worker->getPassword(),
            $worker->getRole()
        ]);

        $email = $worker->getEmail();
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
            $worker->getName(),
            $worker->getSurname(),
            $worker->getCompany()
        ]);
    }
}