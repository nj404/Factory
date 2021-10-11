<?php
ob_start();
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

$id_prov = $_GET['id_prov'];
if(isset($_GET['id_prov']))
{

$delete_sql= (" DELETE FROM providers WHERE id_prov = '$id_prov'");
mysql_query($delete_sql) or die("<p>При УДАЛЕНИИ данных произошла ошибка. Операция delete_sql!</p>". mysql_error());

echo "<h1>Запис успішно видалений!</h1>";


//Ожидание 1 секунды и перенаправление пользователя
//header('Refresh: 1; http://factory/providers');
}
?>
