<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        // TODO display login.html
        $this->render('login');
    }

    public function time() {
        // TODO display time.html
        $this->render('time');
    }

    public function worker_settings() {
        // TODO display worker_settings.html
        $this->render('worker_settings');
    }

    public function workers() {
        //TODO display workers.html
        $this->render('workers');
    }

    public function manager_settings() {
        // TODO display managet_settings.html
        $this->render('manager_settings');
    }

    public function reports() {
        // TODO display reports.html
        $this->render('reports');
    }
}

?>