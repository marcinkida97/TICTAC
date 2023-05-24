<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/Time.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TimeRepository.php';
require_once __DIR__.'/../repository/WorkersRepository.php';

class TimeController extends AppController
{
    private $mesages = [];
    private $timeRepository;
    private $workersRepository;
    private $user;
    private $workplaces;
    private $summary;

    public function __construct()
    {
        parent::__construct();
        $this->timeRepository = new TimeRepository();
        $this->workersRepository = new WorkersRepository();
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $this->user = $_SESSION['user'];
        $this->workplaces = $this->workersRepository->getWorkplaces();
        $this->summary = $this->timeRepository->getTimeOverview($this->user->getId());
    }

    public function time() {
        return $this->render('time', ['user' => $this->user, 'workplaces' => $this->workplaces, 'summary' => $this->summary]);
    }

    public function addTime()
    {
        if($this->isPost()) {
            $time = new Time($_POST['start-time'], $_POST['end-time'], $_POST['workplaces']);
            $this->timeRepository->addTime($time);
            return $this->render('time', ['user' => $this->user, 'messages' => $this->mesages, 'workplaces' => $this->workplaces, 'summary' => $this->summary]);
        }

        return $this->render('time', ['user' => $this->user, 'messages' => $this->mesages, 'workplaces' => $this->workplaces, 'summary' => $this->summary]);
    }
}