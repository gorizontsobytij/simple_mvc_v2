<?php

namespace vendor\core;

class ConnectDB {
    /*---------------------------------------------------------------------------
     * Класс, отвечающий за соединение с базой данных. Основанный на синглтоне,
     * лишь единожды создает подключене
     * --------------------------------------------------------------------------
     */

    private static $_link = null;

    private function __construct(){}
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    /*
      * connect DB with Singleton template
      */
    public static function getLink()
    {
        if (null === self::$_link) {
            self::$_link = new \PDO(DSN, USERNAME, PASSWORD);
            self::$_link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$_link->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE , \PDO :: FETCH_ASSOC );

        }
        return self::$_link;
    }
}
