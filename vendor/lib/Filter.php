<?php


namespace vendor\lib;


class Filter {
    /*
     * Класс для фильтрации данных из формы.
     */
    //private $salt;
    /*public function getSalt() {
        return $this->salt;
    }*/

    /*
     * Функция фильтрует данные массивом
     */
    public function dataFiltration($source) {
        //var_dump($source);
        $salt = mt_rand(001, 999);
        $arr = array();
        foreach ($source as $key => $condition) {
            //var_dump($key);
            //var_dump($this->_data);
            if (!empty(Input::type())) {

                switch ($key) {
                    case 'login';
                        $arr['login'] = htmlentities($condition);
                    break;

                    case 'password';
                        $arr['password'] = htmlentities(md5(md5($condition)));
                    break;

                    case 'password2';
                        $arr['password2'] = htmlentities(md5(md5($condition)));
                    break;

                    case 'mail';
                        $arr['mail'] = htmlentities($condition);
                }
            }
        }
        return $arr;
    }

}