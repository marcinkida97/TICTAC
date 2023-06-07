<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/WorkersRepository.php';
require_once __DIR__.'/../repository/WorkplacesRepository.php';
require_once __DIR__.'/../repository/TimeRepository.php';
require_once __DIR__ . '/../encryption/MyEncryptor.php';

class SecurityController extends AppController
{
    private $userRepository;
    private $decryptor;
    private $workplacesRepository;
    private $workersRepository;
    private $timeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->workplacesRepository = new WorkplacesRepository();
        $this->workersRepository = new WorkersRepository();
        $this->decryptor = new MyEncryptor();
        $this->timeRepository = new TimeRepository();
    }
    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user || $user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist!']]);
        }

        $decryptedPassword = $this->decryptor->decrypt($user->getPassword());

        if ($decryptedPassword !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        session_start();
        $_SESSION['user'] = $user;

        $workplaces = $this->workplacesRepository->getWorkplaces();
        $url = "http://$_SERVER[HTTP_HOST]";

        if ($user->getRole() == 'worker') {
            $summary = $this->timeRepository->getTimeOverview($user->getId());
            return $this->render('time', ['user' => $user, 'workplaces' => $workplaces, 'summary' => $summary]);
        }

        if ($user->getRole() == 'manager') {
            $workers = $this->workersRepository->getWorkers();
            return $this->render('workers', ['user' => $user,'workers' => $workers, 'workplaces' => $workplaces]);
        }
    }
}