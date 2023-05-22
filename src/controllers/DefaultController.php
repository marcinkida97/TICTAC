<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        $this->render('login');
    }

    public function time() {
        session_start();
        $user = $_SESSION['user'];
        $this->render('time', ['user' => $user]);
    }

    public function worker_settings() {
        session_start();
        $user = $_SESSION['user'];
        $this->render('worker_settings', ['user' => $user]);
    }

    public function manager_settings() {
        session_start();
        $user = $_SESSION['user'];
        $this->render('manager_settings', ['user' => $user]);
    }

    public function reports() {
        session_start();
        $user = $_SESSION['user'];
        $this->render('reports', ['user' => $user]);
    }
}