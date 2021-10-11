<?php
ob_start();
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';


$delete_sql= (" DELETE FROM `param`");
mysql_query($delete_sql) or die("<p>При УДАЛЕНИИ данных произошла ошибка. Операция delete_sql!</p>". mysql_error());

echo "<h1>Всі данні успішно видалені!</h1>";


//Ожидание 1 секунды и перенаправление пользователя
header('Refresh: 1; http://factory/param');
/*error_reporting(0);
@include_once("lib/conf/config.inc.php");
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_query($link, 'SET NAMES utf8');
$id = $_POST['id'];
if(isset($id))
{
	$sql = "DELETE FROM invnt WHERE id_pr='$id'";
	$result = mysqli_query($link, $sql);
	if($result) echo "true"; else echo "false";
}
mysqli_close($link);*/
?>