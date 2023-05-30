<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Workplace.php';
require_once __DIR__.'/../models/Worker.php';

class WorkplacesRepository extends Repository
{
    public function getWorkplaces() :array
    {
        $result = [];

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $user = $_SESSION['user'];
        $company = $user->getCompany();

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM workplaces_lookup WHERE company = :company
        ');
        $stmt->bindParam(':company', $company);
        $stmt->execute();
        $workplaces = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($workplaces as $workplace) {
            $result[] = new Workplace(
                $workplace['workplace_id'],
                $workplace['company'],
                $workplace['workplace'],
                $workplace['salary']
            );
        }
        return $result;
    }

    public function addWorkplace(Workplace $workplace): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO workplaces_lookup (company, workplace, salary)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $workplace->getCompany(),
            $workplace->getWorkplace(),
            $workplace->getSalary()
        ]);
    }
}