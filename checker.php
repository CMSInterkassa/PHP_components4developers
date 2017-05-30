<?php

// если в настройках кассы интерфейс в полях URL взаимодействия выставлен POST если же используется GET -
// тогда в дальше место переменной $_POST используем $_GET

$dataSet = $_POST;

//Для просмотра расширенного ответа
//$answer = 'Our answer from Interkassa :'.PHP_EOL;
//foreach ($dataSet as $key => $val) {
//    $answer .= $key.' => '.$val.PHP_EOL;
//}
$needle = $dataSet['ik_sign'];

unset($dataSet['ik_sign']);// удаляем из данных строку подписи
ksort($dataSet, SORT_STRING); // сортируем по ключам в алфавитном порядке элементы массива

$test_key = 'wVKaWkpgF4AmFuD8'; // В данном случае используется тестовый ключ 

array_push($dataSet, $test_key); // добавляем в конец массива ключ
$signString = implode(':', $dataSet); // конкатенируем значения через символ ":"
$sign = base64_encode(md5($signString, true)); // берем MD5 хэш в бинарном виде по сформированной строке и кодируем в BASE64

if ($needle == $sign) {
    $answer .= 'Sign successfully'.PHP_EOL;
    echo 'OK';

} else {

    $answer .= 'Sign do not match'.PHP_EOL;
    echo 'Something bad';
}
$answer .= 'IK sing :'.$needle.PHP_EOL;
$answer .= 'locally formed :'.$sign.PHP_EOL;

file_put_contents('answer.txt', $answer);



