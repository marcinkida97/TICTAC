<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        // TODO display login.html
        die("index method");
    }

    public function time() {
        // TODO display time.html
        die("time method");
    }

    public function worker_settings() {
        // TODO display worker_settings.html
        die("worker_settings");
    }

    public function workers() {
        //TODO display workers.html
        die("workers");
    }

    public function manager_settings() {
        // TODO display managet_settings.html
        die("manager_settings");
    }

    public function reports() {
        // TODO display reports.html
        die("reports");
    }
}

?>