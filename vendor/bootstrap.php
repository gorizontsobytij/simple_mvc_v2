<?php
use vendor\core;

session_start();
include_once ('config/link_params.php');



spl_autoload_register(function($className){
    require_once $path = Q_path. "/" . str_replace("\\", "/", $className) . '.php';
});


$router_start =  new core\Router();
$router_start->Start();



