<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Worker.php';
require_once __DIR__.'/../repository/WorkersRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class WorkersController extends AppController
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
        $this->userRepository = new UserRepository();
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $this->user = $_SESSION['user'];
        $this->workers = $this->workersRepository->getWorkers();
    }

    public function workers() {
        $this->render('workers', ['user' => $this->user ,'workers' => $this->workers]);
    }

    public function addWorker()
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $user = $_SESSION['user'];
        $company = $user->getCompany();

        if($this->isPost()) {
            $worker = new Worker($_POST['new-worker-email'], $_POST['new-worker-password'], $_POST['new-worker-name'], $_POST['new-worker-surname'], $_POST['new-worker-role'], $company);
            $this->workersRepository->addWorker($worker);
            $this->render('workers', ['user' => $this->user ,'workers' => $this->workers]);
        }
        $this->render('workers', ['user' => $this->user ,'workers' => $this->workers]);
    }
}