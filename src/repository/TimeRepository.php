<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Time.php';

class TimeRepository extends Repository
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
}