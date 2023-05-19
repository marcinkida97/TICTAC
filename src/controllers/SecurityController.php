<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

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

        $url = "http://$_SERVER[HTTP_HOST]";
        //TODO przekierowanie do odpowiedniej lokacji. W przypadku jak jest pracownik to ma iść do time a jak manager to do workers!!
        if ($user->getRole() == 'worker') {
            header("Location: {$url}/time");
            return $this->render('time');
        }
        if ($user->getRole() == 'manager') {
            header("Location: {$url}/workers");
            return $this->render('workers');
        }
    }
}