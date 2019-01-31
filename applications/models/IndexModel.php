<?php
namespace applications\models;

use vendor\core\Model;
use applications\controllers;
use vendor\core;

class IndexModel extends Model
{
    private $_link;

    public function __construct()
    {
        $this->_link = core\ConnectDB::getLink();
    }

    /*public function searchLogin($data)
    {
        $this->_link = core\ConnectDB::getLink();

        $login = $data['login'];
        $password = $data['password'];
        //Берем соль с базы данных
        $sql1 = $this->_link->query("SELECT salt FROM mvc_v2.users WHERE login = '$login'");
        $salt = $sql1->fetch();
        //Меняем новую соль на соль из бызы и сравниваем
        //$password = substr($data['password'], 0,32) . $salt['salt'] ;//удаляем новую соль. !!!обязательно сделать адекватное решение
        $sql = $this->_link->prepare("SELECT login, password, salt FROM mvc_v2.users
                                                      WHERE (login = '$login' AND password = '$password')");
        $sql->execute();
        $searching = $sql->fetch();
        //var_dump($searching);
        //не забыть вынести за пределы модели
        /*if($searching == null){
            if ($searching['login'] == null) echo 'Логин не найден';
            if ($searching['password'] == null) echo 'Пароль не верный';
        } else {
            return true;
        }*/

    public function searchLogSQL($data)
    {
        $login = $data['login'];
        $password = $data['password'];

        $sql = $this->_link->prepare("SELECT login, password 
                                                FROM mvc_v2.users WHERE login = '$login' AND password = '$password' ");
        $sql->execute();
        $searching = $sql->fetch(\PDO::FETCH_BOTH);
        var_dump($searching);
    }


}