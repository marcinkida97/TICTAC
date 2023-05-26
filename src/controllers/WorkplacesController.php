<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Worker.php';
require_once __DIR__.'/../repository/WorkersRepository.php';
require_once __DIR__.'/../repository/WorkplacesRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class WorkplacesController extends AppController
{
    private $mesages = [];
    private $workersRepository;
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

    public function workplaces() {
        $this->render('workplaces', ['user' => $this->user ,'workers' => $this->workers, 'workplaces' => $this->workplaces]);
    }

    public function addWorkplace()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $user = $_SESSION['user'];
        $company = $user->getCompany();

        if ($this->isPost()) {
            $workplace = new Workplace($company, $_POST['new-workplace-name'], $_POST['new-workplace-salary']);
            $this->workplacesRepository->addWorkplace($workplace);
            $this->render('workplaces', ['user' => $this->user, 'workers' => $this->workers, 'workplaces' => $this->workplaces]);
        }
        $this->render('workplaces', ['user' => $this->user, 'workers' => $this->workers, 'workplaces' => $this->workplaces]);
    }
}