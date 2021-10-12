<?php
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

/*ЭТАП 1
получаем значения прогнозированых и заданых продаж, а также дату получения товаров*/


/*
$target_val = 100;
$predicted_val = 110;
$date = 001;
*/
if(isset($_POST['auto_order']))
{
$target_val    = strip_tags(trim ($_POST['1']));
$predicted_val = strip_tags(trim ($_POST['2']));
$date          = strip_tags(trim ($_POST['3']));
}

/*
/*ЭТАП 2
проведем определение коефициента корректировки закупок*/

if ($target_val < $predicted_val){
	// тут мы получим значение не в "%", а в десятичной дроби (пример: "0,2")
	//Это нужно чтоб не деалать дополнительные превражения в "ПОСЛЕДНЕМ этапе" когда к +20% будем прибавлять $correction
	$calculation = (($predicted_val - $target_val) / ($predicted_val / 100)) / 100; 
	
	$correction = round($calculation, 2);
	}
else {
	$correction = 0;
	}


/*ЭТАП 3
вставляем данные в таблицу "закупки" с одновлеменным перерасчетом значение "количество"

Я ТАК И НЕ ПОНЯЛ КАК ВСТАВЛЯТЬ ДАТУ В АВТОМАТИЧЕСКИЕ ЗАКУПКИ
*/


mysql_query("
INSERT INTO request_supply (`id`, `description`, `group`, `units`, `quantity`, `tare`, `price`, `id_prov`, `date`) 
(SELECT `id`, `description`, `group`, `units`, ((`reserve` - `quantity`) + (`reserve` * (0.2 + $correction))), `tare`, `price`, `id_prov`, `date` FROM avalible_raw 
WHERE `id` = 1)
;");


//ДЛЯ ПРОСТОТЫ РЕДАКТИРОВАНИЯ КОДА ----------------->
//WHERE `reserve` > `quantity`
//WHERE `id` = 1

/*ЭТАП 4
выводим сообщение =)*/
echo "<h1>Список закупівель успішно стрений!<br></h1>";
echo "Режим : автоматичний <br><br>";
echo "Перевірте таблицю ЗАЯВКИ НА ПОСТАВКУ СИРОВИНИ.";
echo "<br><br>";

//для визуализации пересчитаем в % $correction
$demo = $correction * 100;

echo "Коефіціент корекції склав: $correction або $demo % <br><br><br>";

echo "---Перевірка отримання параметрів---<br>";
echo "Задане значення: $target_val <br>";
echo "Прогнозоване значення: $predicted_val <br>";
echo "Дата: $date  <br>";


?>






