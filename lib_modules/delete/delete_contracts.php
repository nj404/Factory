<?php
ob_start();
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

$id_cont = $_GET['id_cont'];
if(isset($_GET['id_cont']))
{

$delete_sql= (" DELETE FROM contracts WHERE id_cont = '$id_cont'");
mysql_query($delete_sql) or die("<p>При УДАЛЕНИИ данных произошла ошибка. Операция delete_sql!</p>". mysql_error());

echo "<h1>Запис успішно видалений!</h1>";


//Ожидание 1 секунды и перенаправление пользователя
//header('Refresh: 1; http://factory/contracts');
}

?>
