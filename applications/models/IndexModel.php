<?php
namespace applications\models;

use vendor\core\Model;
use applications\controllers;
use vendor\core;

class IndexModel extends Model
{
    private $_link;

    public $login, $password;

    public function __construct()
    {
        $this->_link = core\ConnectDB::getLink();
    }

/*-----------------------------------------------------------------------------------------------
 * Функция ищет данные в базе если находит совпадение - возвращает true, иначе выводит исключение
 * !!! нужно перенести логику в другой класс
 -----------------------------------------------------------------------------------------------*/
    public function searchLogSQL($data)
    {
        $login = $data['login'] ?? '';
        $password = $data['password'] ?? '';
        //$password .=255;
        //var_dump($password);
        $sql = $this->_link->prepare("SELECT login, password 
                                                FROM mvc_v2.users WHERE login = '$login' AND password = '$password' ");
        $sql->execute();
        $searching = $sql->fetch(\PDO::FETCH_ASSOC);
        $this->login = $searching['login'];
        $this->password = $searching['password'];

    }
}