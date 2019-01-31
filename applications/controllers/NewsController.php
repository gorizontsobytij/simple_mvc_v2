<?php
namespace applications\controllers;
use applications\models\NewsModel;
use vendor\core\Controller;
//use app\models;
//use vendor\core\Model;
use vendor\core\View;

class NewsController extends Controller {

    public function NewsAction() {
        $model = new NewsModel();
        var_dump($model->model);
        $view = new View();
        $view->generate('News');
    }

}
