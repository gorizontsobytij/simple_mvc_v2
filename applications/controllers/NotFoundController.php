<?php

namespace applications\controllers;
use vendor\core;


class NotFoundController extends core\Controller {

    public function __construct() {}

    public function NotFoundAction() {
        //print 'not found action';
        $view = new core\View();
        $view->generate('NotFound');
    }
}