<?php

class Workplace
{
    private $workplace_id;
    private $company;
    private $workplace;
    private $salary;

    public function __construct($workplace_id, $company, $workplace, $salary)
    {
        $this->workplace_id = $workplace_id;
        $this->company = $company;
        $this->workplace = $workplace;
        $this->salary = $salary;
    }

    public function getWorkplaceId()
    {
        return $this->workplace_id;
    }

    public function setWorkplaceId($workplace_id): void
    {
        $this->workplace_id = $workplace_id;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company): void
    {
        $this->company = $company;
    }

    public function getWorkplace()
    {
        return $this->workplace;
    }

    public function setWorkplace($workplace): void
    {
        $this->workplace = $workplace;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary): void
    {
        $this->salary = $salary;
    }
}
