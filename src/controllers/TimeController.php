<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/Time.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TimeRepository.php';
require_once __DIR__.'/../repository/WorkplacesRepository.php';

class TimeController extends AppController
{
    private $messages = [];
    private $timeRepository;
    private $workplacesRepository;
    private $user;
    private $workplaces;
    private $summary;

    public function __construct()
    {
        parent::__construct();
        $this->timeRepository = new TimeRepository();
        $this->workplacesRepository = new WorkplacesRepository();
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $this->user = $_SESSION['user'];
        $this->workplaces = $this->workplacesRepository->getWorkplaces();
        $this->summary = $this->timeRepository->getTimeOverview($this->user->getId());
    }

    public function time() {
        return $this->render('time', ['user' => $this->user, 'workplaces' => $this->workplaces, 'summary' => $this->summary]);
    }

    public function addTime()
    {
        if($this->isPost()) {
            $time = new Time($_POST['start-time'], $_POST['end-time'], $_POST['workplaces']);
            $this->timeRepository->addTime($time, $this->user);
            $this->messages[] = "Time added successfully!";
        }

        return $this->render('time', ['user' => $this->user, 'messages' => $this->messages, 'workplaces' => $this->workplaces, 'summary' => $this->summary]);
    }
}