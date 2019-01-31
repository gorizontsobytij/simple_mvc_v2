<?php

namespace vendor\core;


class View {

    public function __construct() {}

    public function generate($view, $data = []){
        include Q_path. '/applications/views/template.php';
    }
}