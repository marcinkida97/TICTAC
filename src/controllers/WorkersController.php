<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
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
        $this->workplaces = $this->workersRepository->getWorkplaces();
    }

    public function workers() {

        $this->render('workers', ['user' => $this->user ,'workers' => $this->workers, 'workplaces' => $this->workplaces]);
    }
}