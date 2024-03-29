<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/Time.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/WorkersRepository.php';
require_once __DIR__.'/../repository/ReportsRepository.php';

class ReportsController extends AppController
{
    private $messages = [];
    private $user;
    private $reportsRepository;

    public function __construct()
    {
        parent::__construct();
        session_start();

        $this->user = $_SESSION['user'];
        $this->reportsRepository = new ReportsRepository();
    }

    public function reports()
    {
        $this->render('reports', ['user' => $this->user]);
    }

    public function generateMonthlyReport()
    {
        $this->reportsRepository->generateMonthlyReport();
        $this->render('reports', ['user' => $this->user, 'messages' => $this->messages]);
    }
}