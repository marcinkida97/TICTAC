<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Time.php';
require_once __DIR__.'/../models/Timeoverview.php';

class TimeRepository extends Repository
{

    public function getTimeOverview(int $uid): ?Timeoverview
    {
        $salary = 10;

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $user = $_SESSION['user'];
        $uid = $user->getId();

        $stmt = $this->database->connect()->prepare('
            SELECT sum(duration) FROM time WHERE date_trunc(\'month\', start_time) = date_trunc(\'month\', CURRENT_TIMESTAMP) AND uid = :uid'
        );
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        $thisMonth = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
            SELECT sum(duration) FROM time WHERE uid = :uid;
        ');
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        $overall = $stmt->fetch(PDO::FETCH_ASSOC);

        $timeoverview = new Timeoverview($thisMonth['sum'], $overall['sum'], $salary);
        return $timeoverview;
    }

    public function addTime(Time $time): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO time (uid, start_time, end_time, workplace)
            VALUES (?, ?, ?, ?)
        ');

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $user = $_SESSION['user'];

        $stmt->execute([
            $user->getId(),
            $time->getStartTime(),
            $time->getEndTime(),
            $time->getWorkplace()
        ]);
    }
}