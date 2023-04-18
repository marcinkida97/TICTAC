<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User(email: 'jsnow@pk.edu.pl', password: 'admin', name: 'John', surname: 'Snow');
        var_dump($_POST);
        die();
    }
}