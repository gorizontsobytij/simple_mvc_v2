<?php


namespace vendor\core;


class ManagerDB {

    public $_db_name = array();

    public function DataBaseName() {

        $tables = ConnectDB::getLink()->query('SHOW TABLES from mvc_v2');
        $tables = $tables->fetchAll();
        $this->_db_name = $tables;
    }
}