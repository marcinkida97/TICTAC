<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Time.php';

class WorkersRepository extends Repository
{

    public function getTime(string $email): ?Time
    {
        //TODO

        return new Time();
    }

    public function addTime(Time $time): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO time (uid, start_time, end_time, workplace)
            VALUES (?, ?, ?, ?)
        ');

        session_start();
        $user = $_SESSION['user'];

        $stmt->execute([
            $user->getId(),
            $time->getStartTime(),
            $time->getEndTime(),
            $time->getWorkplace()
        ]);
    }

    public function getWorkers() :array
    {
        $result = [];

        session_start();
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
}