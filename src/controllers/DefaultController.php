<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        // TODO display login.php
        $this->render('login');
    }

    public function time() {
        // TODO display time.php
        $this->render('time');
    }

    public function worker_settings() {
        // TODO display worker_settings.php
        $this->render('worker_settings');
    }

    public function workers() {
        //TODO display workers.php
        $this->render('workers');
    }

    public function manager_settings() {
        // TODO display managet_settings.html
        $this->render('manager_settings');
    }

    public function reports() {
        // TODO display reports.php
        $this->render('reports');
    }
}