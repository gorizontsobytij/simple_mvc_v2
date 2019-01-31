<?php

namespace vendor\lib;

use vendor\core\ConnectDB;

class Validator {
    /*-------------------------------------------------------------------------------
     * Класс для работы с входными данными формы.
     * Сравнивает данные из формы с утановленными в контроллерами правилами,
     * собирает и сохраняет возможные ошибки
     * ------------------------------------------------------------------------------
     */

    private $_errors = [];
    private $_passed = false;

    public function __construct() {}

    /*
     * Функция сравнивает данные из формы с утановленными в контроллерами правилами
     */
    public function checkData($source, $items = []) { //функция, что принимает данные из поста и разбирает на правила

        foreach ($items as $fields => $rules) {
           // var_dump($source);//массив данных разбирается на значение и правила к нему
            foreach ($rules as $rule => $rule_value) {
                if (!empty( $_POST)) {// берем с масива пост данные соответствуют ключам массива правил
                    if(empty(array_diff_key($_POST,$source))){
                        if( key_exists($fields,$_POST)){
                            $value = $source[$fields];//значение поста
                           // var_dump($source[$fields]);
                            //var_dump($value);
                          //  var_dump($fields);
                        } /*else{
                            $source[$fields] = false ;
                            var_dump($source);
                            $value = $source[$fields];

                        }*/
               // var_dump($source);
                    }else{
                        echo "Хватит менять поля";
                        return false;
                    }

                }
                if ($rule === 'required' && empty($value)){
                    $this->addError("Необходимо указать {$fields}");
                } else if (!empty($value)) {
                    switch ($rule) {

                        case 'min';
                        if (strlen($value) < $rule_value) {
                            $this->addError("{$fields} должно быть не меньше {$rule_value}");
                            }
                            break;

                        case 'max';
                        if (strlen($value) > $rule_value) {
                            $this->addError("{$fields} должно быть не больше {$rule_value}");
                            }
                            break;

                        case 'matches';
                        if ($value != $source[$rule_value]) {
                           $change = array_flip($source);
                           //var_dump($source);
                           $change = $change[$source[$rule_value]];
                            $this->addError("{$fields} должно совпадать с {$change}");
                        }
                            break;

                        case 'unique';
                        $check = ConnectDB::getLink()->query("SELECT COUNT(*) FROM mvc_v2.users WHERE login='$value'");
                        $check = $check->fetchAll();
                       // var_dump($check[0]['COUNT(*)']);
                        if ($check[0]['COUNT(*)'] > 0) {
                            $this->addError("Поле {$fields} -  {$value} уже существуют");
                        }
                            break;

                        case 'regular';
                        if ($rule_value === 0) {
                            $this->addError("Отсутствует знак @ ");
                        }
                            break;
                    }
                }
            }
        }
        if (empty($this->getError())) { //возвращает положительное значение, ели правила пройдены
            $this->_passed = true;
        }
        return $this->_passed;
    }
    /*
     * Функция собирает ошибки в массив
     */
    private function addError($error) {
        $this->_errors[] = $error;
    }
    /*
     *  Геттер для массива ошибок
     */
    public function getError() {
        return $this->_errors;
    }

}