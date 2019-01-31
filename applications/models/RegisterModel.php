<?php


namespace applications\models;

use vendor\core\ConnectDB;
use vendor\core;
use applications\controllers;
use vendor\lib\Filter;

class RegisterModel extends core\Model
{

    private $_link;

    public function saveRegData($data)
    {
        $password = $data['password'];
        $login = $data['login'];
        $mail = $data['mail'];
        $salt = substr($data['password'], -3, 3);
        $tm = time();
        $this->_link = ConnectDB::getLink();
        $input = $this->_link->prepare("INSERT INTO mvc_v2.users (login, password, salt, mail_reg, mail,reg_date)
                                                  VALUES ('$login', '$password', '$salt', '$mail', '$mail', '$tm') ");
        $input->execute();
    }
}
