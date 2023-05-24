<?php

class Timeoverview
{
    private $thisMonth;
    private $overall;
    private $salary;

    public function __construct($thisMonth, $overall, $salary)
    {
        $this->thisMonth = $thisMonth;
        $this->overall = $overall;
        $this->salary = $salary;
    }

    public function getThisMonth()
    {
        return $this->thisMonth;
    }

    public function setThisMonth($thisMonth): void
    {
        $this->thisMonth = $thisMonth;
    }

    public function getOverall()
    {
        return $this->overall;
    }

    public function setOverall($overall): void
    {
        $this->overall = $overall;
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
