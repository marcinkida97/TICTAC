<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SettingsController extends AppController
{
    private $userRepository;

    public function changeUserData()
    {
        $this->userRepository = new UserRepository();

        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $user = $_SESSION['user'];

        if($this->isPost()) {
            $newName = $_POST['settings-name'] ?: $user->getName();
            $newSurname = $_POST['settings-surname'] ?: $user->getSurname();
            $newEmail = $_POST['settings-email'] ?: $user->getEmail();
            $newPassword = $_POST['settings-password'] ?: $user->getPassword();

            $newUserData = new User($user->getId(), $newEmail, $newPassword, $newName, $newSurname, $user->getRole(), $user->getCompany());
            $this->userRepository->changeUserData($newUserData);

            $_SESSION['user'] = $newUserData;

            if ($user->getRole() == 'worker') {
                return $this->render('worker_settings', ['user' => $newUserData, 'messages' => ["Changes saved in the database"]]);
            }

            if ($user->getRole() == 'manager') {
                return $this->render('manager_settings', ['user' => $newUserData, 'messages' => ["Changes saved in the database"]]);
            }
        }
    }
}