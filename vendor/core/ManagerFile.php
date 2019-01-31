<?php

namespace vendor\core;


class ManagerFile {

    private $_db_name_class = array();

    /**
     * @return array
     */
    public function getDbNameClass(): array {
        return $this->_db_name_class;
    }

    /*
     * Функция для получения списка существующих моделей
     */
    public function CheckFile() {
        $dir =  M_path;
        $tmp = array();
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                $file = substr($file,0,-9);
                if(!empty($file)){
                    $tmp[] = $file;
                }

            }
            closedir($dh);
        }

        $this->_db_name_class[] = $tmp;
    }

    /*public function selectClass($dir = M_path, $tmp = []) {
        $classes = scandir($dir);
        foreach ($classes as $class ) {
            if ($class != '.' || $class != '..') {
                $res = substr($class, 0, -9);
                var_dump($res);
                $tmp[] = $res;
            }
        }
        $this->_db_name_class[] = $tmp;
    }*/
}