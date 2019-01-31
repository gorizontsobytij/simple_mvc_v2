<?php
namespace vendor\core;
use applications\controllers;


class Router {
    /*
     * Основной класс, отвечающий за роутинг. Представлен статической функцией Start
     */
    public function __construct() {}

    public static function Start() {

        //Convert the query string to an array
        $route_array = explode('/', $_SERVER['REQUEST_URI']);

        //check an array elements.
            $controller_name = !empty($route_array[1]) ? $route_array[1]:"index";
            $action_name = !empty($route_array[2]) ? $route_array[2]:"index";


        //add prefixes
        $model_name = ucfirst($controller_name) . "Model";
        $controller_name = ucfirst($controller_name). "Controller";
        $action_name = ucfirst($action_name) . "Action";

        if (file_exists(Q_path . '/applications/models/' . $model_name . '.php')){
          include_once Q_path . '/applications/models/' . $model_name . '.php';
        }
        if (file_exists(Q_path. '/applications/controllers/'. $controller_name. '.php')){
            include_once Q_path. '/applications/controllers/'. $controller_name.'.php';
        } else {
            include_once Q_path . '/applications/controllers/' . 'NotFoundController' . '.php';
            $nfc = new controllers\NotFoundController();
            $nfc->NotFoundAction();
            return;
        }
        //create an instance of a class from a variable named controller
        $class = "applications\\controllers\\$controller_name";
        $controller = new $class();
        $controller->$action_name();
    }
}