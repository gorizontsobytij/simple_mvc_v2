<?php


namespace applications\controllers;

use applications\models;
use vendor\core;
use vendor\lib;


class RegisterController
{
    public function RegisterAction() {
        $view = new core\View();
        $view->generate('Register'); // генерация вида
        $this->getRegData();
    }

    /*
     * Функция принимает данные из формы и сравнивает их с правилами,
     * если правила пройдены - отправляет данные в фильтратор и получает отфильрованные данные
     */
    public function getRegData() {
        $validation = new lib\Validator();
        //var_dump($_POST);
        // проводим в валидатор данные с поста и массив с правилами
        $valid = $validation->checkData($_POST, [
            "login" => [
                'required' => true,
                'min' => 3,
                'max' => 15,
                'unique' => true
            ],
            'password' => [
                'required' => true,
                'min' => 3,
                'max' => 15,
            ],
            'password2' => [
                'required' => true,
                'min' => 3,
                'max' => 15,
                'matches' => 'password',
            ],
            'mail' => [
                'required' => true,
                'min' => 8,
                'max' => 30,
                'regular' => preg_match('/@/', $_POST['mail'])
            ],
            'agree' =>[
                'required' => true,
        ]

        ]);
        /*
         * выводим ошибки !!! перенести в вид
         */
        if(!empty($validation->getError())) {
            var_dump($validation->getError());

        }
        /*
         * Если проходит валидация, фильтруем данные
         */
        if($valid !==false){
            $filter = new lib\Filter();
            $reg_data_filter = $filter->dataFiltration($_POST);
            $insert = new models\RegisterModel();
            //$insert->saveRegData($reg_data_filter);
            if($insert->saveRegData($reg_data_filter) != false) return;// сделать добавление в сессию и куки

        }
    }
}

