<?php

class Time
{
    private $startTime;
    private $endTime;
    private $workplace;

    public function __construct($startTime, $endTime, $workplace)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->workplace = $workplace;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function setStartTime(string $startTime)
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }

    public function setEndTime(string $endTime)
    {
        $this->endTime = $endTime;
    }

    public function getWorkplace(): string
    {
        return $this->workplace;
    }

    public function setWorkplace(string $workplace)
    {
        $this->workplace = $workplace;
    }
}
