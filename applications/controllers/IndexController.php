<?php
namespace applications\controllers;
use applications\models;
use vendor\core;
use vendor\lib;


class IndexController extends core\Controller
{
    public function __construct() {}

    private $_filtered_auth_data = [];
    private $_valid;

    public function IndexAction()
    {
        parent::IndexAction();
        $this->checkAuth();
    }

    public function checkAuth()
    {
        //var_dump($_POST);
        $data_filter = [];
        $validation = new lib\Validator();
        $this->_valid = $validation->checkData($_POST, [
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
            if ($this->_valid == false) throw new \Exception('Данные не прошли валидацию');
            else {
                $filter = new lib\Filter();
                $this->_filtered_auth_data = $filter->dataFiltration($_POST);
                $search = new models\IndexModel();
                if ($search->searchLogSQL($this->_filtered_auth_data) === true)
                    echo "Привет " .$this->_filtered_auth_data['login'];//тут конечно же придумать что-то поумнее

            }
        } catch (\Exception $exception) {
            echo 'Возникла ошибка' . $exception->getMessage();
        }
    }

    //Дальше нужно довавить сессии и куки

}
