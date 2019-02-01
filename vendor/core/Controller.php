<?php

namespace vendor\core;

use applications\models\IndexModel;
use applications\models\UsersModel;



class Controller
{

    public function __construct(){}

    public function IndexAction() {
        $model = new UsersModel();

        $chk = new ManagerFile();
        $chk->CheckFile();

        $view = new View();
        $view->generate('Index');
    }
}
