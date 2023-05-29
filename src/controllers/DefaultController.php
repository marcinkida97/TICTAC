<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index(): void {
        $this->render('login');
    }

    public function workerSettings(): void {
        session_start();
        $user = $_SESSION['user'];
        $this->render('worker_settings', ['user' => $user]);
    }

    public function managerSettings(): void {
        session_start();
        $user = $_SESSION['user'];
        $this->render('manager_settings', ['user' => $user]);
    }

    public function logout(): void {
        session_destroy();
        setcookie(session_name(), '', time() - 3600);
    }
}