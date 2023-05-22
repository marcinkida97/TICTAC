<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/WorkersRepository.php';

class WorkersController extends AppController
{
    private $mesages = [];
    private $workersRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workersRepository = new WorkersRepository();
    }

    public function workers() {
        $workers = $this->workersRepository->getWorkers();
        $this->render('workers', ['workers' => $workers]);
    }
}