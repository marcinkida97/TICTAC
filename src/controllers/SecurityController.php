<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/WorkersRepository.php';
require_once __DIR__.'/../repository/TimeRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();
        $workersRepository = new WorkersRepository();
        $workplaces = $workersRepository->getWorkplaces();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not exists!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $_SESSION['user'] = $user;

        $url = "http://$_SERVER[HTTP_HOST]";

        if ($user->getRole() == 'worker') {
            $timeRepository = new TimeRepository();
            $summary = $timeRepository->getTimeOverview($user->getId());
            return $this->render('time', ['user' => $user, 'workplaces' => $workplaces, 'summary' => $summary]);
        }
        if ($user->getRole() == 'manager') {
            $workers = $workersRepository->getWorkers();
            return $this->render('workers', ['user' => $user,'workers' => $workers, 'workplaces' => $workplaces]);
        }
    }
}