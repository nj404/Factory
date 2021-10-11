<?php
ob_start();
// подключаем БД
include $_SERVER['DOCUMENT_ROOT'].'/old_connection.php';

$id_user = $_GET['id_user'];
if(isset($_GET['id_user']))
{

$delete_sql= (" DELETE FROM users WHERE id_user = '$id_user'");
mysql_query($delete_sql) or die("<p>При УДАЛЕНИИ данных произошла ошибка. Операция delete_sql!</p>". mysql_error());

echo "<h1>Користувач успішно видалений!</h1>";
}
?>