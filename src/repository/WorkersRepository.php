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
            SELECT * FROM users WHERE company = :company
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
            INSERT INTO users (email, password, name, surname, role, company)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $worker->getEmail(),
            $worker->getPassword(),
            $worker->getName(),
            $worker->getSurname(),
            $worker->getRole(),
            $worker->getCompany()
        ]);
    }
}