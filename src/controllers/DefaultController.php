<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index(): void {
        $this->render('login');
    }

    public function worker_settings(): void {
        session_start();
        $user = $_SESSION['user'];
        $this->render('worker_settings', ['user' => $user]);
    }

    public function manager_settings(): void {
        session_start();
        $user = $_SESSION['user'];
        $this->render('manager_settings', ['user' => $user]);
    }

    public function logout(): void {
        $this->render('logout');
    }
}