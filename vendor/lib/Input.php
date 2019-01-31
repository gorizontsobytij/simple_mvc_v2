<?php

namespace vendor\lib;


class Input
{
    public $type_data = [];


    public static function type($type = 'post') {
        switch ($type) {

            case 'post':
                return (!empty($_POST)) ? true : false;
                break;

            case 'get':
                return (!empty($_GET)) ? true : false;
                break;

            default:
                return false;
                break;
        }
    }

    /*public static function request($item)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            return $_POST[$item];
        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
            return $_GET[$item];
        } else {
            return '';
        }
        /*if(isset($_POST[$item])){
            return $_POST [$item];
        }elseif (isset($_GET[$item])){
            return $_GET [$item];
        }
        return '';*/


    public function request()
    {
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $this->type_data = $_POST;
        } elseif ($_SERVER ['REQUEST_METHOD'] == 'GET') {
            $this->type_data = $_GET;
        } else false;
    }
}