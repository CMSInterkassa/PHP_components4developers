<?php

$dataSet = array (
		"ik_co_id" => "5534b1683b1eaf00758b4567",
		"ik_pm_no" => "47533H-28042015-184310",
		"ik_pw_via" => "test_interkassa_test_xts",
		"ik_am" => "8990.00",
		"ik_cur" => "RUB",
		"ik_desc" => "Your order No 47533H-28042015",
		"ik_co_prs_id" => "404025496344",
		"ik_inv_id" => "36051650",
		"ik_inv_st" => "success",
		"ik_inv_crt" => "2015-04-28 18:48:39",
		"ik_inv_prc" => "2015-04-28 18:48:39",
		"ik_trn_id" =>"",
		
		"ik_co_rfn" => "8810.2000",
		"ik_ps_price" => "9079.90",
		
				
		);
$key = "VYZ1aGgkqmzyQshG"; //В данном случае используется "Секретный ключ"

//unset($dataSet['ik_sign']); удаляем из данных строку подписи
ksort($dataSet, SORT_STRING); // сортируем по ключам в алфавитном порядке элементы массива
array_push($dataSet, $key); // добавляем в конец массива "секретный ключ"
$signString = implode(':', $dataSet); // конкатенируем значения через символ ":"
echo $signString;//вывод строки
echo "<br>";
echo "---------- sign ------------";
echo "<br>";
$sign = base64_encode(md5($signString, true)); // берем MD5 хэш в бинарном виде по сформированной строке и кодируем в BASE64
//return $sign; // возвращаем результат
echo $sign;

?>