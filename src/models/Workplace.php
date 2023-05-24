<?php

class Workplace
{
    private $company;
    private $workplace;
    private $salary;

    public function __construct($company, $workplace, $salary)
    {
        $this->company = $company;
        $this->workplace = $workplace;
        $this->salary = $salary;
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
