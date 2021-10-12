<?php
ob_start();
// подключаем БД
//include 'old_connection.php';
$connection=mysql_connect("localhost","nick1","nick1");
$db=mysql_select_db("db_factory");
mysql_query("SET NAMES 'utf8';");
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
if(!$connection || !$db)
{
    exit(mysql_error());
}



$insert_sql= (" INSERT INTO `request_supply_old` select * FROM `request_supply`");
mysql_query($insert_sql) or die("<p>При ПЕРЕНОСІ данних виникла помилка. Операція insert_sql!</p>". mysql_error());

$delete_sql= (" DELETE FROM `request_supply`");
mysql_query($delete_sql) or die("<p>При ВИДАЛЕННІ данних виникла помилка. ОперацІя delete_sql!</p>". mysql_error());

echo "<h1>Заявки успішно підтверджені.</h1>";


//Ожидание 1 секунды и перенаправление пользователя
header('Refresh: 1; http://factory/request_supply');


?>

