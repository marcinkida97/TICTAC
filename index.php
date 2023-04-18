<?php

//print("Hello world!")

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('time', 'DefaultController');
Routing::get('worker_settings', 'DefaultController');
Routing::get('workers', 'DefaultController');
Routing::get('manager_settings', 'DefaultController');
Routing::get('reports', 'DefaultController');

Routing::run($path);

?>