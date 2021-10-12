<?php
ob_start();
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

$id = $_GET['id'];
if(isset($_GET['id']))
{

$insert_sql= (" INSERT INTO coming_raw_old SELECT * FROM coming_raw WHERE id = '$id'");
mysql_query($insert_sql) or die("<p>При ПЕРЕНОСІ данних виникла помилка. Операція insert_sql!</p>". mysql_error());

$delete_sql= (" DELETE FROM coming_raw WHERE id = '$id'");
mysql_query($delete_sql) or die("<p>При ВИДАЛЕННІ данних виникла помилка. ОперацІя delete_sql!</p>". mysql_error());

echo "<h1>Запис успішно переміщено!</h1>";
}


//Ожидание 1 секунды и перенаправление пользователя
//header('Refresh: 1; http://factory/coming_raw_old');
header('Refresh: 1; http://factory/coming_raw');

?>

