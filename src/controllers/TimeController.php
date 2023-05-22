<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/Time.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TimeRepository.php';

class TimeController extends AppController
{
    private $mesages = [];
    private $timeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->timeRepository = new TimeRepository();
    }


    public function addTime()
    {
        if($this->isPost()) {
            $time = new Time($_POST['start-time'], $_POST['end-time'], $_POST['workplaces']);
            $this->timeRepository->addTime($time);


            return $this->render('time', ['messages' => $this->mesages]);
        }

        $this->render('time', ['messages' => $this->mesages]);
    }
}