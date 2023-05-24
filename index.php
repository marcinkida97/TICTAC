<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('time', 'TimeController');
Routing::get('worker_settings', 'DefaultController');
Routing::get('workers', 'WorkersController');
Routing::get('manager_settings', 'DefaultController');
Routing::get('reports', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('addTime', 'TimeController');
Routing::post('changeUserData', 'SettingsController');

Routing::run($path);

?>