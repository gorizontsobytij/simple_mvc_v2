<?php
namespace applications\controllers;
use applications\models;
use vendor\core;
use vendor\lib;


class IndexController extends core\Controller
{
    public function __construct() {}

    private $_filtered_auth_data = [];

    public function IndexAction()
    {
        parent::IndexAction();
        $this->checkAuth();
        $this->getAuth();
    }

    public function checkAuth()
    {
        //var_dump($_POST);
        $data_filter = [];
        $validation = new lib\Validator();
        $valid = $validation->checkData($_POST, [
            "login" => [
                'required' => true,
                'min' => 3,
                'max' => 15,
            ],
            'password' => [
                'required' => true,
                'min' => 3,
                'max' => 15,
            ]
        ]);
        /*
         * выводим ошибки !!! перенести в вид
         */
        if (!empty($validation->getError())) {
            //var_dump($validation->getError());
        }
        /*
         * Если проходит валидация, фильтруем логин и пароль
         * пароль приходит в хешированом виде для сравнения
         * с базой данных
         */
        try {
            if ($valid !==false) throw new \Exception('Данные не прошли валидацию');
            $filter = new lib\Filter();
            $this->_filtered_auth_data = $filter->dataFiltration($_POST);
        } catch (\Exception $exception) {
            echo 'Возникла ошибка' . $exception->getMessage();
        }
        /*if ($valid !==false){
            $filter = new lib\Filter();
            $this->_filtered_auth_data = $filter->dataFiltration($_POST);
            //$insert = new IndexModel();
            //$insert->searchLogin($auth_data_filter);
           //if ($insert->searchLogin($auth_data_filter) ===true ){
               //$_SESSION['login'] = $auth_data_filter['login'];
              // var_dump($_SESSION['login']);
           }
        }*/
    }

    private function getAuth()
    {
        $select = new models\IndexModel();
        //$select->searchLogSQL($_POST);
        $select->searchLogSQL($this->_filtered_auth_data);
        var_dump($this->_filtered_auth_data);
        //$input = new lib\Input();
        //var_dump($input->type_data);

    }



}
