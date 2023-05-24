<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Time.php';
require_once __DIR__.'/../models/Timeoverview.php';

class TimeRepository extends Repository
{

    public function getTimeOverview(int $uid): ?Timeoverview
    {
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

        $stmt = $this->database->connect()->prepare('
    SELECT time.duration, workplaces_lookup.salary
    FROM time
    INNER JOIN workplaces_lookup ON time.workplace = workplaces_lookup.workplace
    WHERE EXTRACT(MONTH FROM time.start_time) = :currentMonth AND uid = :uid
');
        $currentMonth = date('m');
        $stmt->bindParam(':currentMonth', $currentMonth);
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();

        $totalSalary = 0;

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $durationString = $row['duration'];
                $salary = $row['salary'];

                $startDateTime = new DateTime('00:00:00');
                $endDateTime = new DateTime($durationString);
                $interval = $startDateTime->diff($endDateTime);

                $hours = $interval->h + ($interval->i / 60) + ($interval->s / 3600);

                $payment = $hours * $salary;
                $totalSalary += $payment;
            }
        }
        $totalSalary = round($totalSalary, 2);
        $timeoverview = new Timeoverview($thisMonth['sum'], $overall['sum'], $totalSalary);
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