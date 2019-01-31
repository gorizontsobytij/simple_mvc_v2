<?php
echo "view news";

/*
$arr = [2, 3, 1, 9, 4, 33, 566, 45, 45 ];
$count_min = 0;
$count_max =0;
$max = 0;
$min = 0;
$tmp = $arr[0];
$tmp2 = $arr[0];
for ($i = 0; $i < count($arr); $i++){
    if($tmp > $arr[$i]){
      $tmp = $arr[$i];
      $min = $tmp;
      $count_min = $i;
    }
   if ($tmp2 < $arr[$i]){
      $tmp2 = $arr[$i];
      $max = $tmp2;
       $count_max=$i;
    }

}
$arr[$count_min] = $max;
$arr[$count_max] = $min;
echo $min;
echo $max;
echo "<br>";
var_dump($arr);*/

/*$x  = 598459459450450584;

function countNum($num, $target){
    $num = (string)$num;
    $counter = 0;
    for ($i = 0; $i < strlen($num); $i++){
        if ($num[$i] ==

            $target){
            $counter++;
        }
    }
    echo "число {$target} встречается {$counter} раз";
}

countNum(458849854958, 5);*/




$array = array(1, 0, 6, 9, 4, 5, 2, 3, 8, 7); // исходный массив
$count = 0;
$count2=0;
// перебираем массив
for ($j = 0; $j < count($array) - 1; $j++){
    for ($i = 0; $i < count($array) - $j - 1; $i++){
        //1-9(J=0),2-8(j=1),3-7(j=2),4-6(3),5-5(4)
// если текущий элемент больше следующего
        if ($array[$i] > $array[$i + 1]){

            var_dump($array);
            echo $count;
            echo "<br>";
// меняем местами элементы
            $tmp_var = $array[$i + 1];
            $array[$i + 1] = $array[$i];
            $array[$i] = $tmp_var;
            $count++;
        }
    }

}

// вывод результата
var_dump($array);