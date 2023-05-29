<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/TimeController.php';
require_once 'src/controllers/WorkersController.php';
require_once 'src/controllers/WorkplacesController.php';
require_once 'src/controllers/SettingsController.php';
require_once 'src/controllers/ReportsController.php';
require_once 'src/controllers/RegisterController.php';

class Routing {

    public static $routes;

    public static function get($url, $controller)
    {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller)
    {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];

        if(!array_key_exists($action, self::$routes))
        {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?:'index';
        $object->$action();
    }
}