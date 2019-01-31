<?php

namespace vendor\core;

use applications\models\IndexModel;
use applications\models\UsersModel;
use vendor\lib\DB\Queries;


class Controller
{

    public function __construct(){}

    public function IndexAction() {
        $model = new UsersModel();
       //var_dump( $model->find(1)) ;
//var_dump($model->getModel());
        $chk = new ManagerFile();
        $chk->CheckFile();
        //$builder = new Builder($query,$link);

       // var_dump($builder->id(2));
        ///var_dump($model);
      //  $res = $model->id(15);
       // var_dump($res);

        $view = new View();
        $view->generate('Index');
    }
}
