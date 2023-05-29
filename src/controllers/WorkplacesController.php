<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Worker.php';
require_once __DIR__.'/../models/Workplace.php';
require_once __DIR__.'/../repository/WorkersRepository.php';
require_once __DIR__.'/../repository/WorkplacesRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class WorkplacesController extends AppController
{
    private $messages = [];
    private $workersRepository;
    private $workplacesRepository;
    private $userRepository;
    private $user;
    private $workers;
    private $workplaces;

    public function __construct()
    {
        parent::__construct();
        $this->workersRepository = new WorkersRepository();
        $this->workplacesRepository = new WorkplacesRepository();
        $this->userRepository = new UserRepository();
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $this->user = $_SESSION['user'];
        $this->workers = $this->workersRepository->getWorkers();
        $this->workplaces = $this->workplacesRepository->getWorkplaces();
    }

    public function workplaces()
    {
        return $this->render('workplaces', ['user' => $this->user, 'workers' => $this->workers, 'workplaces' => $this->workplaces]);
    }

    public function addWorkplace()
    {
        if($this->isPost()) {
            $user = $_SESSION['user'];
            $company = $user->getCompany();
            $workplace = new Workplace($company, $_POST['new-workplace-name'], $_POST['new-workplace-salary']);
            $this->workplacesRepository->addWorkplace($workplace);
            $this->messages[] = "Workplace added successfully!";
        }

        return $this->render('workplaces', ['user' => $this->user, 'workers' => $this->workers, 'workplaces' => $this->workplaces, 'messages' => $this->messages]);
    }
}